import { createRouter, createWebHistory } from 'vue-router'

import ScenarioPage from '@pages/Scenario/ScenarioPage.vue'

import ClientListPage from '@pages/Client/ClientListPage.vue'

import CompanyListPage from '@pages/Company/CompanyListPage.vue'
import CompanyFormPage from '@pages/Company/CompanyFormPage.vue'
import CompanyDestroyPage from '@pages/Company/CompanyDestroyPage.vue'



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: '/',
      component: ScenarioPage
    },
    {
      path: '/client',
      name: 'client',
      component: ClientListPage
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
    }
  ]
})

export default router
