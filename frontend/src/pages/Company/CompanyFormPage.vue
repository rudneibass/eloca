<script setup lang="ts">
import  CustomCard  from '@components/CustomCard.vue'
import { ref, onMounted } from 'vue'
import { apiCompany } from '@services/apiCompany'
import { CompanyInterface } from '@services/apiCompany/types'
import { useRoute, useRouter } from 'vue-router'
import { toast } from  'vue3-toastify'
import 'vue3-toastify/dist/index.css'

const data = ref<CompanyInterface>({} as CompanyInterface)

const router = useRouter()
const route = useRoute()
const pk_company = ref('')
const loading = ref(false)

  
function formValidate(formData:CompanyInterface ){
  const formErrors = []  
  if(!formData.razao_social || formData.razao_social.trim() === ''){
    formErrors.push('Preencha o campo "Razão Social"')
  }

  if(!formData.sigla || formData.sigla.trim() === ''){
    formErrors.push('Preencha o campo "Sigla"')
  }

  if(!formData.empresa){
    formErrors.push('Preencha o campo "Nº da Empresa"')
  }

  if(formData.empresa < 1){
    formErrors.push('Preencha o campo "Nº da Empresa" com um número positivo maior que zero')
  }

  if(typeof formData.empresa !== 'number'){
    formErrors.push('O campo "Nº da Empresa" só permite números')
  }

  if(formErrors.length > 0){
    formErrors.map(item => toast.info(item, {autoClose: false}))
    return false
  }
 
  return true
}

async function formSubmit(){

  // Simple Validation
  const isValidForm = formValidate(data.value)
  if(!isValidForm){
    return
  }

  // Obj validated without "codigo" (data.value can has "código")
  const company = {
        empresa: data.value.empresa,
        razao_social: data.value.razao_social,
        sigla: data.value.sigla
      }

  // Create    
  if(!pk_company.value){
      loading.value = true
      const response = await apiCompany.storeCompany(company)
      
      if(response.length === 0){
        toast.error('Erro ao tentar realizar o cadastro, contate o administrador.',{autoClose: false})
        loading.value = false
        return
      }
    
      toast.success('Cadastro realizado com sucesso!',{autoClose: 2000})    
      loading.value = false
      pk_company.value = response[0].codigo.toString()
      return
  } 

  // Update
  if(pk_company.value){
      const response = await apiCompany.updateCompany(pk_company.value, company)
      
      if(response.length === 0){
        toast.error('Erro ao tentar atualizar o cadastro, contate o administrador.',{autoClose: false})
        loading.value = false
        return
     }

      toast.success('Cadastro atualizado com sucesso!',{autoClose: 2000})
      loading.value = false
      return
  } 
}


onMounted(async () => {
  loading.value = true

  await router.isReady()
  if(route.params){
    const params = route.params
    
    if (Array.isArray(params.pk)) {
      pk_company.value = params.pk[0]
      const response = await apiCompany.showCompany(pk_company.value)
      data.value = response[0]
    } 

   if(typeof params.pk === "string"){
        pk_company.value = params.pk
        const response = await apiCompany.showCompany(pk_company.value)
        data.value = response[0]    
    } 

  }
  loading.value = false
})

</script>

<template>
    <div>
        <CustomCard card-title="Empresas" short-description="Cadastro de Empresas">
          
          <section>
            <form action="" @submit.prevent="formSubmit">
              <div class="row">
                
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="razao_social">Razão Social *</label>
                    <input id="razao_social" v-model="data.razao_social" type="text" class="form-control"  autofocus />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group mb-3">
                    <label for="sigla">Sigla *</label>
                    <input id="sigla" v-model="data.sigla" type="text" class="form-control" >
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group mb-3">
                    <label for="sigla">Nº da Empresa *</label>
                    <input id="sigla" v-model="data.empresa" type="number" class="form-control">
                  </div>
                </div>

                <div class="col-md-12 d-flex justify-content-end pt-4 mt-5 border-top">
                  
                  <RouterLink to="/company" class="btn btn-outline-secondary">
                    <font-awesome-icon icon="fa-solid fa-undo" class="icon"/> Voltar
                  </RouterLink>
                  &nbsp;

                  <button v-if="!loading" type="submit" class="btn btn-secondary">
                    <font-awesome-icon icon="fa-solid fa-save" class="icon"/>  Salvar
                  </button>
                

                  <button v-if="loading"  class="btn btn-secondary">
                    <img src="@assets/loading-white-sm.svg" />
                  </button>

                </div>
              </div>
            </form>
          </section>
        </CustomCard>
    </div>
</template>
<style scoped>
.btn{
  min-width: 6rem;
}
</style>