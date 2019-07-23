<template>
    <div>
        <div class="login-box">
            <div class="login-logo">
                <a href="/"><b>Automaticket</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Digite seu e-mail e senha</p>

                <div v-if="error" class="alert alert-danger">
                    Usuário ou senha incorretos! Tente novamente.
                </div>
                <form v-on:submit.prevent="login">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" v-model="user.email" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" v-model="user.password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
    </div>
</template>

<script>

    import http from '../../http.js'
    import cookies from 'vue-cookies'

    export default {
        name: 'login-component',
        data : function () {
            return {
                user : {
                    email : '',
                    password : ''
                },
                token : '',
                error : false
            }
        },
        methods :{
            login: function() {

                http.post('/login', this.user).then((res) => {
                    
                    if(res.data.token) {
                        cookies.set('access_token', res.data.token);
                        this.$router.push('/users')
                    }
                    
                }).catch((error) => {
                    this.user.password = '';
                    this.error = true
                });
            }
        }
    }
</script>
