import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/home/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/client',
    name: 'client',
    component: () => import('../views/client/AboutView.vue')
  },
  {
    path: '/admin',
    name: 'admin',
    component: () => import('../views/admin/AdminView.vue')
  },
  {
    path: '/sinais',
    name: 'sinais',
    component: () => import('../views/admin/SinaisView.vue')
  },
  {
    path: '/medicamentos',
    name: 'medicamentos',
    component: () => import('../views/admin/MedicamentosView.vue')
  },
  {
    path: '/cadastros',
    name: 'cadastros',
    component: () => import('../views/client/CadastrosView.vue')
  },
  {
    path: '/feedback',
    name: 'feedback',
    component: () => import('../views/client/FeedbackView.vue')
  },
  {
    path: '/pagamento',
    name: 'pagamento',
    component: () => import('../views/client/PagamentoView.vue')
  },
  {
    path: '/desativar',
    name: 'desativar',
    component: () => import('../views/admin/DesativarView.vue')
  },
  {
    path: '/cadastroAdmin',
    name: 'cadastroAdmin',
    component: () => import('../views/admin/CadastroAdminView.vue')
  },
  {
    path: '/higieneAdmin',
    name: 'higieneAdmin',
    component: () => import('../views/admin/HigieneView.vue')
  },
  {
    path: '/operacaoAdmin',
    name: 'operacaoAdmin',
    component: () => import('../views/admin/OperacaoView.vue')
  },
  {
    path: '/listUser',
    name: 'listUser',
    component: () => import('../views/admin/UserListView.vue')
  },
  {
    path: '/pets',
    name: 'pets',
    component: () => import('../views/admin/PetsView.vue')
  },
  {
    path: '/feedbackAdmin',
    name: 'feedbackAdmin',
    component: () => import('../views/admin/FeedBackAdminView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
