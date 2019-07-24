import Vue from 'vue'
import Router from 'vue-router'
import Login from '@/pages/login/index'
import UsersIndex from '@/pages/users/index'
import Create from '@/pages/users/create'
import Edit from '@/pages/users/edit'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/',
      name: 'user-index',
      component: UsersIndex,
      meta: { requiresAuth: true }
    },
    {
      path: '/users/create',
      name: 'create',
      component: Create,
      meta: { requiresAuth: true }
    },
    {
      path: '/users/:id/edit',
      name: 'edit',
      component: Edit,
      meta: { requiresAuth: true }
    },
    {
      path: '*',
      redirect: '/login'
    }
  ]
})
