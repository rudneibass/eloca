<script  setup lang="ts">
import  CustomCard  from '@components/CustomCard.vue'
import { ref, onMounted } from 'vue'
import { apiCompany } from '@services/apiCompany'
import { CompanyInterface } from '@services/apiCompany/types'


const data = ref<CompanyInterface[]>([])
const columns = ref({})

const handleDestroy = (id:number) => {
  console.log(id)
}

onMounted( async () => {
  const response = await apiCompany.listCompany()
  data.value = response
  columns.value = Object.keys(data.value[0])
})

</script>

<template>
    <div>
        <CustomCard card-title="Empresas" short-description="Listagem de Empresas">

            <table class="table table-striped table-hover  table-bordered">
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
        </CustomCard>
    </div>
</template>
