<template>

<div>
    <section class="content-header">
        <h1>
            Novo Usuário
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div v-if="error" class="alert alert-danger">
                    Ocorreu um erro ao salvar os dados : {{error}}
                </div>
                <form v-on:submit.prevent="save">
                    <div class="form-group">
                        <label class="control-label">Nome</label>
                        <input type="text" v-model="user.name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">E-mail</label>
                        <input type="email" v-model="user.email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">CEP</label>
                        <input type="text" v-model="user.zipcode" @change="getAddressFromViaCep" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Logradouro</label>
                        <input type="text" v-model="user.address" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Numero</label>
                        <input type="text" v-model="user.number" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Bairro</label>
                        <input type="text" v-model="user.neighborhood" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Estado</label>
                        <input type="text" v-model="user.province" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Cidade</label>
                        <input type="text" v-model="user.city" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nome do pai</label>
                        <input type="text" v-model="user.father_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">nome da mãe</label>
                        <input type="text" v-model="user.mother_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Salvar" class="btn btn-primary">
                    </div>
                </form>
            </div>
           
        </div>

    </section>
</div>

</template>

<script>

    import http from '../../http'

    export default {

        data () {
            return  {
                user : {},
                error: false
            }
        },

        computed : {
            zipcode() {
                return this.user.zipcode
            }
        },

        methods :{
            save() {
                http.post('/user', this.user).then((res) => {
                    
                    if(res.status == 201) {
                        this.$router.push('/users')
                    }
                    
                }).catch((error) => {
                    this.error = error
                });
            },
            getAddressFromViaCep(){
                delete axios.defaults.headers.common['X-CSRF-TOKEN']
                axios.get('https://viacep.com.br/ws/'+ this.zipcode +'/json/').then((res) => {
                    this.user.zipcode = res.data.cep;
                    this.user.address = res.data.logradouro;
                    this.user.city = res.data.localidade;
                    this.user.province = res.data.uf;
                    this.user.neighborhood = res.data.bairro;

                })  
            }
        },
        whatch : {
            zipcode() {
                getAddressFromViaCep();
            }
        }
    
    }

</script>