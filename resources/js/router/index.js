import Vue from 'vue'
import Router from 'vue-router'
import Example from '../components/ExampleComponent'
import Users from '../views/users/list'
import Login from '../views/auth/login'
import UserCreate from '../views/Users/create'

import cookies from 'vue-cookies'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'users',
      'component': Users,
      meta : {
        auth : true
      }
    },
    {
      path: '/users/create',
      name: 'user.create',
      'component': UserCreate,
      meta : {
        auth : true
      }
    },
    {
      path: '/login',
      name: 'login',
      'component': Login,
      meta : {
        plainLayout: true
      }
    }
  ]
});

router.beforeEach((to, from , next) => {
  if(!cookies.get('access_token') && to.meta.auth) {
    return router.push('/login');
  }

  next();
});

export default router;