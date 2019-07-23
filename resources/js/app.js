require('./bootstrap');

import Vue from 'vue'
import App from './views/App'
import router from './router'
import http from './http'

Vue.config.productionTip = false

new Vue({
    el: '#app',
    router,
    components: { App },
    template: '<App/>',
    beforeMount() {
        http.interceptors.response.use(null, async (error) => {
            if (error.response.status === 401) {

                this.$router.push('/login');
                return axios.request(error.config);
            } 
            return Promise.reject(error);
        });
    }
})