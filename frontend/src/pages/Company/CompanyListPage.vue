<script  setup lang="ts">
import  CustomCard  from '@components/CustomCard.vue'
import { ref, onMounted } from 'vue'
import { apiCompany } from '@services/apiCompany'
import { CompanyInterface } from '@services/apiCompany/types'


const data = ref<CompanyInterface[]>([])
const columns = ref({})
const performSearch = ref(false)

const handleDestroy = (id:number) => {
  console.log(id)
}

async function formSubmit(){
  const response = await apiCompany.searchCompany()
  data.value = response
  performSearch.value = true
}

onMounted( async () => {
  if(!performSearch.value){
    const response = await apiCompany.listCompany()
    data.value = response
    columns.value = Object.keys(data.value[0])
  }
  
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
                    <input id="serach_param" type="text" class="form-control" placeholder="Pesquisar">
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
                    <th scope="col">Código</th>
                    <th scope="col">Nº Empresa</th>
                    <th scope="col">Sigla</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col" class="text-center"></th>
                    <th scope="col" class="text-center"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(row, index) in data" :key="index">
                    <td v-for="(value, key) in row" :key="key">{{ value }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-danger" @click="handleDestroy(row.codigo)"><i class="fs-7 bi-trash"></i></button>
                      </td>
                      <td class="text-center">
                        <RouterLink :to="{name: 'company.update', params:{pk: row.codigo}}" class="btn btn-sm btn-secondary">
                          <i class="fs-7 bi-pencil"></i>
                        </RouterLink>  
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>
        </CustomCard>
    </div>
</template>
