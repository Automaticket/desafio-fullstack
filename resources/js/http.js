import axios from 'axios'
import NProgress from 'nprogress'
import cookies from 'vue-cookies'

const http = axios.create({
  baseURL: '/api'
})

http.interceptors.request.use(config => {
  NProgress.start();

  config.headers.Authorization = 'Bearer ' + cookies.get('access_token');
  config.headers.Accept = 'application/json';

  return config
})

http.interceptors.response.use(response => {
  NProgress.done()
  return response
})

export default http