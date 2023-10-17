<script  setup lang="ts">
import  CustomCard  from '@components/CustomCard.vue'
import { ref, onMounted } from 'vue'
import { apiClient} from '@services/apiClient'
import { ClientInterface } from '@services/apiClient/types'


const data = ref<ClientInterface []>([])

const performSearch = ref(false)
const searchParam = ref('')
const thereIsNoData = ref(false)
const loading = ref(true)

async function formSubmit(){
  
  loading.value = true
  thereIsNoData.value = false
  data.value = []
  
  const response = searchParam.value.trim() === ''? await  apiClient.listClient() : await apiClient.searchClient(searchParam.value) 
  data.value = response

  if(data.value.length === 0){
      thereIsNoData.value = true
    }

  performSearch.value = true  
  loading.value = false 
}

onMounted( async () => {
  if(!performSearch.value){
    const response = await apiClient.listClient()
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
        <CustomCard card-title="Clientes" short-description="Listagem de Clientes">
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
                  <RouterLink to="client/store" class="btn bg-warning d-flex align-items-center justify-content-center gap-1">
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
                    <th scope="col" class="width-5"><small>Reqnum.</small></th>
                    <th scope="col"><small>Razão Social</small></th>
                    <th scope="col" class="width-5"><small>Tipo</small></th>
                    <th scope="col" class="width-10"><small>CPF/CNPJ</small></th>
                    <th scope="col" class="width-5 text-center"></th>
                    <th scope="col" class="width-5 text-center"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in data" :key="index">
                    <td>{{ item.codigo }}</td>
                    <td>{{ item.recnum }}</td>
                    <td>{{ item.razao_social }}</td>
                    <td>{{ item.tipo }}</td>
                    <td>{{ item.cpf_cnpj }}</td>
                   
                    <td class="text-center">
                        <RouterLink :to="{name: 'client.destroy', params:{pk: item.codigo}}" class="btn btn-sm btn-danger">
                          <i class="fs-7 bi-trash"></i>
                        </RouterLink>  
                      </td>
                      <td class="text-center">
                        <RouterLink :to="{name: 'client.show', params:{pk: item.codigo}}" class="btn btn-sm btn-secondary">
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

            <div class="d-flex justify-content-between p-1">
                <small>Total de registros: {{ data.length }}</small>
                <small>Página 1 de 1</small>
            </div>

          </section>
        </CustomCard>
    </div>

</template>
<style scoped>
  .alert{
    border-radius: 2px !important;
  }
  .table-responsive{
    max-height: 40vh;
    overflow-y: scroll;
  }
</style>
