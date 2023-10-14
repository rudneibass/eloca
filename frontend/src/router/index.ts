import { createRouter, createWebHistory } from 'vue-router'

import ScenarioPage from '@pages/Scenario/ScenarioPage.vue'

import ClientListPage from '@pages/Client/ClientListPage.vue'

import CompanyListPage from '@pages/Company/CompanyListPage.vue'
import CompanyFormPage from '@pages/Company/CompanyFormPage.vue'



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
      name: 'company',
      component: CompanyListPage
    },
    {
      path: '/company/update/:pk',
      name: 'company.update',
      component: CompanyFormPage
    },
    {
      path: '/company/store',
      name: 'company.store',
      component: CompanyFormPage
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../pages/NotFoundPage.vue')
    }
  ]
})

export default router
