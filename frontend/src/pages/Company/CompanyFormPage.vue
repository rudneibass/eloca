<script setup lang="ts">
import  CustomCard  from '@components/CustomCard.vue'
import { ref, onMounted } from 'vue'
import { apiCompany } from '@services/apiCompany'
import { CompanyInterface } from '@services/apiCompany/types'
import { useRoute, useRouter } from 'vue-router'
import { toast } from  'vue3-toastify'
import 'vue3-toastify/dist/index.css'

const router = useRouter()
const route = useRoute()
const pk_company = ref('')

const data = ref<CompanyInterface>({
  codigo: 0,
  empresa: 0,
  sigla: '',
  razao_social: ''
})

async function formSubmit(){
  if(pk_company.value){
      toast('Tem pk,faça update',{autoClose: 2000})
  } 

  if(!pk_company.value){
      toast('Não tem pk, faça insert',{autoClose: 2000})
  } 
  /*data.value.codigo = parseInt(pk_company.value)
  console.log(data.value)

  const response = await apiCompany.updateCompany(data.value)
  data.value = response[0] 

  toast('Cadastro atualizado com sucesso',{autoClose: 2000})*/
}

onMounted(async () => {
  await router.isReady()
  if(route.params){
    const params = route.params
    if (Array.isArray(params.pk)) {
      pk_company.value = params.pk[0]
      const response = await apiCompany.getCompany(pk_company.value)
      data.value = response[0]
    } else {
        pk_company.value = params.pk
        const response = await apiCompany.getCompany(pk_company.value)
        data.value = response[0]    
    } 
  }
       
})

</script>

<template>
    <div>
        <CustomCard card-title="Empresas" short-description="Cadastro de Empresas">
            <form action="" @submit.prevent="formSubmit">
              <div class="row">
                
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="razao_social">Razão Social</label>
                    <input id="razao_social" v-model="data.razao_social" type="text" class="form-control"  autofocus required />
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group mb-3">
                    <label for="sigla">Sigla</label>
                    <input id="sigla" v-model="data.sigla" type="text" class="form-control"  required>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group mb-3">
                    <label for="sigla">Empresa</label>
                    <input id="sigla" v-model="data.empresa" type="text" class="form-control" placeholder="Numero da empresa" required>
                  </div>
                </div>

                <div class="col-md-12 d-flex justify-content-end">
                  <RouterLink to="/company" class="btn btn-outline-secondary">
                    Voltar
                  </RouterLink>
                  &nbsp;
                  <button type="submit" class="btn btn-secondary">Salvar</button>
                </div>
              </div>
            </form>
        </CustomCard>
    </div>
</template>
