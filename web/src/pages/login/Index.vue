<template>
    <div>
        <form class="login" @submit.prevent="login">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="ml-5">
                        <p class="mb-0">
                            <strong>Email:</strong>
                            admin@email.com
                        </p>
                        <p>
                            <strong>Senha:</strong>
                            password
                        </p>
                    </div>
                    <div class="card p-5 m-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign in</h5>

                            <div class="alert alert-danger" role="alert"
                                v-if="unauthorized">
                                Email e/ou senha estão incorretos.
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input v-model="email" type="email"
                                    class="form-control"
                                    :class="{'is-invalid': errors.email}"
                                    placeholder="Email" />
                                <div class="invalid-feedback" v-if="errors.email"
                                    v-text="errors.email[0]"></div>
                            </div>

                            <div class="form-group">
                                <label>Senha</label>
                                <input v-model="password" type="password"
                                    class="form-control"
                                    :class="{'is-invalid': errors.password}"
                                    placeholder="Senha"/>
                                <div class="invalid-feedback" v-if="errors.password"
                                    v-text="errors.password[0]"></div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import api from '@/services/api';

    export default {
        name: 'login',

        data() {
            return {
                email: '',
                password: '',
                unauthorized: false,
                errors: {}
            }
        },

        methods: {
            login() {
                api.post('login', { email: this.email, password: this.password })
                    .then(({data}) => {
                        window.localStorage.setItem('authUser', JSON.stringify(data.access_token));

                        this.$router.push('/');
                    }).catch((error) => {
                        if (error.response.status === 422) {
                            this.unauthorized = false;
                            this.errors = error.response.data.errors;
                            return;
                        }

                        this.errors = {};
                        this.unauthorized = true;
                    });
            }
        }
    }
</script>
