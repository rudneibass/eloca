import { CompanyInterface, CompanyStoreUpdateInterface } from './types'
import { api } from '../api'
 

async function listCompany(): Promise<CompanyInterface[]> { 
  try {
    const response = await api.get('company')
    console.log(response.data)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}

async function searchCompany(searchParam: string): Promise<CompanyInterface[]> { 
  try {
    const response = await api.get(`company/search/${searchParam}`)
    console.log(response.data)
    return response.data 

  } catch (error) {
    console.log(error)
  }
  return []
}

async function showCompany(param: string): Promise<CompanyInterface[]> { 
  try {
    const response = await api.get(`company/show/${param}`)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}

async function storeCompany(company : CompanyStoreUpdateInterface): Promise<CompanyInterface[]>{
  try {
    const response = await api.post('company/store', company)
    if(response.status === 201){
      return response.data 
    }
  } catch (error) {
    console.log(error)
  }
  return []
}

async function updateCompany(pk_company: string, company : CompanyStoreUpdateInterface): Promise<CompanyInterface[]>{
  try {
    const response = await api.put(`company/update/${pk_company}`, company)
    console.log(response.data)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}

async function destroyCompany(pk_company: string): Promise<CompanyInterface[]>{
  try {
    const response = await api.delete(`company/destroy/${pk_company}`)
    console.log(response.data)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}


export const apiCompany = {
  listCompany,
  showCompany,
  updateCompany,
  storeCompany,
  searchCompany,
  destroyCompany
}
