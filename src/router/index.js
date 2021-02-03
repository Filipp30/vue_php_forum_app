import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/contact',
    name: 'Contact',
    component: () => import('../views/Contact.vue')
  },
  {
    path: '/wagenpark-tarieven',
    name: 'WagenparkTarieven',
    component: () => import('../views/WagenparkTarieven.vue')
  },
  {
    path: '/transport-bestellen',
    name: 'TransportBestellen',
    component: () => import('../views/TransportBestellen.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
