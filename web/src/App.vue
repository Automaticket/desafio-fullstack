<template>
  <div id="app" class="d-flex flex-column justify-content-between">
    <header class="py-2 top__header" :class="{'text-center': !token}">
      <div class="container d-flex justify-content-between align-items-center">
    	<img src="http://automaticket.com.br/images/logo.png">

        <button type="button" class="btn btn-link" @click="logout" v-if="token">
			Sair
		</button>
      </div>
    </header>

    <main class="my-5">
      <div class="container">
        <router-view/>
      </div>
    </main>

    <footer class="bg-dark text-white text-center">
      <div class="py-3">
        By Genivaldo Silva.
      </div>
    </footer>
  </div>
</template>

<script>
  import api from '@/services/api';

  export default {
    name: 'App',

    data() {
      return {
        token: JSON.parse(window.localStorage.getItem('authUser')),
      }
    },

    methods: {
      logout() {
        api.get('logout', { 'headers': { 'Authorization': `Bearer ${this.token}` } })
          .then((response) => {
            if (response.status === 200) {
              this.token = '';
              window.localStorage.removeItem('authUser');
              this.$router.push('/login');
            }
          })
      }
    }
  }
</script>

<style>
	html,
	body,
	#app {
		height: 100%;
	}

	.top__header {
		-webkit-box-shadow: 0 2px 3px rgba(55, 63, 67, .16);
		box-shadow: 0 2px 3px rgba(55, 63, 67, .16);
	}
</style>
