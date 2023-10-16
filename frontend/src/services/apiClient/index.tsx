import { ClientInterface, ClientStoreUpdateInterface } from './types'
import { api } from '../api'
 

async function listClient(): Promise<ClientInterface[]> { 
  try {
    const response = await api.get('client')
    console.log(response.data)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}

async function searchClient(searchParam: string): Promise<ClientInterface[]> { 
  try {
    const response = await api.get(`client/search/${searchParam}`)
    return response.data 

  } catch (error) {
    console.log(error)
  }
  return []
}

async function showClient(param: string): Promise<ClientInterface[]> { 
  try {
    const response = await api.get(`client/show/${param}`)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}

async function storeClient(client : ClientStoreUpdateInterface): Promise<ClientInterface[]>{
  try {
    const response = await api.post('client/store', client)
    if(response.status === 201){
      return response.data 
    }
  } catch (error) {
    console.log(error)
  }
  return []
}

async function updateClient(pk_client: string, client : ClientStoreUpdateInterface): Promise<ClientInterface[]>{
  try {
    const response = await api.put(`client/update/${pk_client}`, client)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}

async function destroyClient(pk_client: string): Promise<ClientInterface[]>{
  try {
    const response = await api.delete(`client/destroy/${pk_client}`)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}


export const apiClient = {
  listClient,
  showClient,
  updateClient,
  storeClient,
  searchClient,
  destroyClient
}
