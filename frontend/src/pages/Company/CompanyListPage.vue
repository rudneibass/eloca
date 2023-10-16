<script  setup lang="ts">
import  CustomCard  from '@components/CustomCard.vue'
import { ref, onMounted } from 'vue'
import { Ref } from 'vue'
import { apiCompany } from '@services/apiCompany'
import { CompanyInterface } from '@services/apiCompany/types'
import { toast } from  'vue3-toastify'
import 'vue3-toastify/dist/index.css'

const data = ref<CompanyInterface[]>([])

const performSearch = ref(false)
const searchParam = ref('')
const thereIsNoData = ref(false)
const loading = ref(true)

async function formSubmit(){
  
  loading.value = true
  thereIsNoData.value = false
  data.value = []
  
  const response = searchParam.value.trim() === ''? await  apiCompany.listCompany() : await apiCompany.searchCompany(searchParam.value) 
  data.value = response

  if(data.value.length === 0){
      thereIsNoData.value = true
    }

  performSearch.value = true  
  loading.value = false  
}

onMounted( async () => {
  if(!performSearch.value){
    const response = await apiCompany.listCompany()
    data.value = response

    if(data.value.length === 0){
      thereIsNoData.value = true
    }
  }
 loading.value = false 
})

</script>

<template>
    <div>
        <CustomCard card-title="Empresas" short-description="Listagem de Empresas">
          <section>
            <form action=""  @submit.prevent="formSubmit">
              <div class="row justify-content-between">
                <div class="col-md-5">
                  <div class="input-group mb-3">
                    <input id="serach_param" v-model="searchParam" type="text" class="form-control" placeholder="Pesquisar">
                    <div class="input-group-append">
                      <button class="btn bg-warning"><font-awesome-icon icon="fa-solid fa-search" class="icon"/></button>
                    </div>
                  </div> 
                </div>
                <div class="col-xl-2  col-lg-3 col-md-4 col-sm-6 mb-3">
                  <RouterLink to="company/store" class="btn bg-warning d-flex align-items-center justify-content-center gap-1">
                      Novo Cadastro <font-awesome-icon icon="fa-solid fa-plus" class="icon"/>
                  </RouterLink>
                </div>
              </div>
            </form>
          </section>

          <section>
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="width-5"><small>Cód.</small></th>
                    <th scope="col" class="width-10"><small>Nº Empresa</small></th>
                    <th scope="col" class="width-10"><small>Sigla</small></th>
                    <th scope="col"><small>Razão Social</small></th>
                    <th scope="col" class="width-5 text-center"></th>
                    <th scope="col" class="width-5 text-center"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in data" :key="index">
                    <td>{{ item.codigo }}</td>
                    <td>{{ item.empresa }}</td>
                    <td>{{ item.sigla }}</td>
                    <td>{{ item.razao_social }}</td>
                    <td class="text-center">
                        <RouterLink :to="{name: 'company.destroy', params:{pk: item.codigo}}" class="btn btn-sm btn-danger">
                          <i class="fs-7 bi-trash"></i>
                        </RouterLink>  
                      </td>
                      <td class="text-center">
                        <RouterLink :to="{name: 'company.show', params:{pk: item.codigo}}" class="btn btn-sm btn-secondary">
                          <i class="fs-7 bi-pencil"></i>
                        </RouterLink>  
                    </td>
                  </tr>
  
                </tbody>
              </table>
              <div v-if="thereIsNoData" class="alert alert-secondary text-center">
                  Não há dados cadastrados!
              </div>
              <div v-if="loading"  class="alert alert-secondary text-center">
                <img src="@assets/loading-gray-md.svg" />
              </div>
            </div>
          </section>
        </CustomCard>
    </div>

</template>
<style scoped>
  .alert{
    border-radius: 2px !important;
  }
</style>
