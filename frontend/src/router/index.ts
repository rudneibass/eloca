import { createRouter, createWebHistory } from 'vue-router'

import ScenarioPage from '@pages/Scenario/ScenarioPage.vue'

import CompanyListPage from '@pages/Company/CompanyListPage.vue'
import CompanyFormPage from '@pages/Company/CompanyFormPage.vue'
import CompanyDestroyPage from '@pages/Company/CompanyDestroyPage.vue'

import ClientListPage from '@pages/Client/ClientListPage.vue'
import ClientFormPage from '@pages/Client/ClientFormPage.vue'
import ClientDestroyPage from '@pages/Client/ClientDestroyPage.vue'




const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: '/',
      component: ScenarioPage
    },
    {
      path: '/company',
      name: 'company.index',
      component: CompanyListPage
    },
    {
      path: '/company/show/:pk',
      name: 'company.show',
      component: CompanyFormPage
    },
    {
      path: '/company/store',
      name: 'company.store',
      component: CompanyFormPage
    },
    {
      path: '/company/destroy/:pk',
      name: 'company.destroy',
      component: CompanyDestroyPage
    },
    {
      path: '/client',
      name: 'client.index',
      component: ClientListPage
    },
    {
      path: '/client/store',
      name: 'client.store',
      component: ClientFormPage
    },
    {
      path: '/client/show/:pk',
      name: 'client.show',
      component: ClientFormPage
    },
    {
      path: '/client/destroy/:pk',
      name: 'client.destroy',
      component: ClientDestroyPage
    },
  ]
})

export default router
