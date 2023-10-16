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
const disableDestroyBtn = ref(false)

async function handleDestroy(){
  
  if(disableDestroyBtn.value){
    return
  }  
  
  const response = await apiCompany.destroyCompany(pk_company.value)

  if(response.length === 0){
    toast.error('Não foi possivel excluir o registro, tente novamente mais tarde.',{autoClose: 2000})
    return
  }

  toast.warning('Registro excluido com sucesso.',{autoClose: 2000})
  loading.value = false
  disableDestroyBtn.value = true

  setTimeout(() => {
    router.push({name: 'company.index'})
  }, 2000)

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
        <CustomCard card-title="Empresas" short-description="Exclusão de Empresas">
          
          <section>
            <div class="alert alert-warning text-center">
              <h5>
                <font-awesome-icon icon="fa-solid fa-warning" class="icon"/> Atenção!
              </h5>
             Tem certeza que deseja excluir esse registro?
            </div>
            <form>
              <div class="row">
                
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="razao_social">Razão Social *</label>
                    <input id="razao_social" v-model="data.razao_social" type="text" class="form-control"  disabled/>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group mb-3">
                    <label for="sigla">Sigla *</label>
                    <input id="sigla" v-model="data.sigla" type="text" class="form-control" disabled>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group mb-3">
                    <label for="sigla">Nº da Empresa *</label>
                    <input id="sigla" v-model="data.empresa" type="number" class="form-control" disabled>
                  </div>
                </div>

                <div class="col-md-12 d-flex justify-content-end pt-4 mt-5 border-top">
                  
                  <RouterLink to="/company" class="btn btn-outline-secondary">
                    <font-awesome-icon icon="fa-solid fa-undo" class="icon"/> Voltar
                  </RouterLink>
                  &nbsp;

                  <button v-if="!loading" class="btn btn-danger" type="button"  :disabled="disableDestroyBtn" @click="handleDestroy">
                    <font-awesome-icon icon="fa-solid fa-remove" class="icon"/>  Excluir
                  </button>
                

                  <button v-if="loading" type="button" class="btn btn-danger">
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