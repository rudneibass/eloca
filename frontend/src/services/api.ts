import axios from 'axios'

export const Api = axios.create({
    baseURL: "https://jucas.fixtecnologia.com.br/api/v1/userglobal"
})
