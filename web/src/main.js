// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'

import swal from 'sweetalert';

import 'bootstrap/dist/css/bootstrap.css'

Vue.config.productionTip = false

router.beforeEach((to, from, next) => {
  const authUser = JSON.parse(window.localStorage.getItem('authUser'));

  if (to.meta.requiresAuth) {

    if (authUser) {
      next();
      return;
    }

    next({ name: 'login' });
  }

  if (authUser && to.name === 'login') {
    next({ name: 'main' });
    return;
  }

  next();
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
