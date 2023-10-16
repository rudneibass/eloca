<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'

import { toast } from  'vue3-toastify'
import 'vue3-toastify/dist/index.css'

import { isValidCPF, isValidCNPJ } from '@utils/index'

import  CustomCard  from '@components/CustomCard.vue'
import { apiClient } from '@services/apiClient'
import { ClientInterface } from '@services/apiClient/types'

import { apiCompany } from '@services/apiCompany'
import { CompanyInterface } from '@services/apiCompany/types'

const data = ref<ClientInterface>({} as ClientInterface)
const companyList = ref<CompanyInterface[]>([{} as CompanyInterface])

const router = useRouter()
const route = useRoute()
const pk_client = ref('')
const loading = ref(false)

  
async function formValidate(formData:ClientInterface ){
  const formErrors = []  
  if(!formData.razao_social || formData.razao_social.trim() === ''){
    formErrors.push('Preencha o campo "Razão Social"')
  }

  if(!formData.empresa){
    formErrors.push('Preencha o campo "Empresa"')
  }

  if(!formData.cpf_cnpj || formData.cpf_cnpj.trim() === ''){
    formErrors.push('Preencha o campo "CPF/CNPJ"')
  }

  /*if(formData.cpf_cnpj || formData.cpf_cnpj.trim() !== ''){
    const response = await apiClient.listClient()
    const cpf = response.filter(item => item.cpf_cnpj === formData.cpf_cnpj)
    if(cpf.length > 0){
      formErrors.push('"CPF/CNPJ" já cadastrado e não permite repetição')
    }
  }*/

  if(formData.tipo.trim() === 'PF'){

    if(!isValidCPF(formData.cpf_cnpj)){
      formErrors.push('"CPF" inválido')
    }
  }

  if(formData.tipo.trim() === 'PJ'){
    if(!isValidCNPJ(formData.cpf_cnpj)){
      formErrors.push('"CNPJ" inválido')
    }
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
        tipo: data.value.tipo,
        cpf_cnpj: data.value.cpf_cnpj
      }

  // Create    
  if(!pk_client.value){
      loading.value = true
      const response = await apiClient.storeClient(company)
      
      if(response.length === 0){
        toast.error('Erro ao tentar realizar o cadastro, contate o administrador.',{autoClose: false})
        loading.value = false
        return
      }
    
      toast.success('Cadastro realizado com sucesso!',{autoClose: 2000})    
      loading.value = false
      pk_client.value = response[0].codigo.toString()
      return
  } 

  // Update
  if(pk_client.value){
      const response = await apiClient.updateClient(pk_client.value, company)
      
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

async function getCompanyList(){
  const response = await apiCompany.listCompany()
  companyList.value = response
}

onMounted(async () => {
  
  getCompanyList()

  loading.value = true

  await router.isReady()
  if(route.params){
    const params = route.params
    
    if (Array.isArray(params.pk)) {
      pk_client.value = params.pk[0]
      const response = await apiClient.showClient(pk_client.value)
      data.value = response[0]
    } 

   if(typeof params.pk === "string"){
        pk_client.value = params.pk
        const response = await apiClient.showClient(pk_client.value)
        data.value = response[0]    
    } 

  }
  loading.value = false
})

</script>

<template>
    <div>
        <CustomCard card-title="Clientes" short-description="Cadastro de Clientes">
          
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
                    <label for="tipo">Tipo *</label>
                    <select id="tipo"  v-model="data.tipo" class="form-select">
                      <optgroup label="PF/PJ">
                        <option value="PF">Pessoa Física</option>
                        <option value="PJ">Pessoa Jurídica</option>
                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group mb-3">
                    <label for="sigla">CPF/CNPJ *</label>
                    <input id="sigla" v-model="data.cpf_cnpj" type="text" class="form-control" >
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="tipo">Empresa *</label>
                    <select id="tipo"  v-model="data.empresa" class="form-select">
                      <optgroup label="Empresa">
                        <option v-for="(item, index) in companyList" :key="index" :value="item.empresa">{{item.razao_social}}</option>
                      </optgroup>
                    </select>
                  </div>
                </div>

                <div class="col-md-12 d-flex justify-content-end pt-4 mt-5 border-top">
                  
                  <RouterLink to="/client" class="btn btn-outline-secondary">
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