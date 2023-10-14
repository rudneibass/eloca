import { CompanyInterface } from './types'
import { Api } from '../api'
 

async function listCompany(): Promise<CompanyInterface[]> { 

  return [
    {codigo:1, empresa: 1, sigla: 'FIAT', razao_social: 'FCA FIAT CHRYSLER AUTOMOVEIS BRASIL LTDA.'},
    {codigo:2, empresa: 2, sigla: 'FORD', razao_social: 'FORD MOTOR COMPANY BRASIL LTDA.'},
    {codigo:3, empresa: 3, sigla: 'BMW', razao_social: 'BMW DO BRASIL LTDA'},
    {codigo:4, empresa: 4, sigla: 'SCANIA', razao_social: ' SCANIA LATIN AMERICA LTDA.'},
  ]
}


async function getCompany(param: string): Promise<CompanyInterface[]> { 
  if(param === '1'){
    return [{codigo:1, empresa: 1, sigla: 'FIAT', razao_social: 'FCA FIAT CHRYSLER AUTOMOVEIS BRASIL LTDA.'}]
  }
  if(param === '2'){
    return [{codigo:2, empresa: 2, sigla: 'FORD', razao_social: 'FORD MOTOR COMPANY BRASIL LTDA.'}]
  }
  if(param === '3'){
    return [{codigo:3, empresa: 3, sigla: 'BMW', razao_social: 'BMW DO BRASIL LTDA'}]
  }
  if(param === '4'){
    return [{codigo:4, empresa: 4, sigla: 'SCANIA', razao_social: ' SCANIA LATIN AMERICA LTDA.'}]
  }
  return []
}

async function updateCompany(company : CompanyInterface): Promise<CompanyInterface[]>{
  try {
    const response = await Api.put('company/update', company)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}

async function storeCompany(company : CompanyInterface): Promise<CompanyInterface[]>{
  try {
    const response = await Api.post('company/update', company)
    return response.data 
  } catch (error) {
    console.log(error)
  }
  return []
}


export const apiCompany = {
  listCompany,
  getCompany,
  updateCompany,
  storeCompany
}
