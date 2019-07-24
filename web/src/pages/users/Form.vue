<template>
    <div>
        <form v-on:submit="save" action="#">
            <fieldset>
                <legend>Dados pessoais</legend>

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control"
                    v-model="form.name" :class="{ 'is-invalid': errors.name }">
                    <div v-if="errors.name" class="invalid-feedback">
                        {{ errors.name[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" class="form-control"
                    v-model="form.email" :class="{ 'is-invalid': errors.email }">
                    <div v-if="errors.email" class="invalid-feedback">
                        {{ errors.email[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="cell_phone">Celular</label>
                    <input type="text" name="email" class="form-control"
                    v-model="form.cell_phone" :class="{ 'is-invalid': errors.cell_phone }">
                    <div v-if="errors.cell_phone" class="invalid-feedback">
                        {{ errors.cell_phone[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="birth_date">Data de nascimento</label>
                    <input type="date" name="birth_date" class="form-control"
                    v-model="form.birth_date" :class="{ 'is-invalid': errors.birth_date }">
                    <div v-if="errors.birth_date" class="invalid-feedback">
                        {{ errors.birth_date[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Selecione o sexo</label>
                    <select name="sexo" class="form-control"
                        v-model="form.sex" :class="{ 'is-invalid': errors.sex }">
                        <option value="m">Masculino</option>
                        <option value="f">Feminino</option>
                    </select>
                    <div v-if="errors.sex" class="invalid-feedback">
                        {{ errors.sex[0] }}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Nome do Pai</label>
                    <input type="text" name="name" class="form-control"
                        v-model="form.father_name">
                </div>

                <div class="form-group">
                    <label for="name">Nome da Mãe</label>
                    <input type="text" name="name" class="form-control"
                        v-model="form.mother_name">
                </div>

                <legend>Endereço</legend>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" class="form-control"
                            v-model="form.address.cep" @keyup="search">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9 form-group">
                        <label for="">Logradouro</label>
                        <input type="text" name="logradouro" class="form-control"
                        v-model="form.address.logradouro">
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="number">Número</label>
                        <input type="text" name="number" id="number" class="form-control"
                        v-model="form.address.number" :class="{ 'is-invalid': errors.number }">
                        <div v-if="errors.number" class="invalid-feedback">
                        {{ errors.number[0] }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="complement">Complemento</label>
                        <input type="text" name="complement" class="form-control"
                            v-model="form.address.complement">
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="">Bairro</label>
                        <input type="text" name="neighborhood" class="form-control"
                            v-model="form.address.neighborhood"
                            :class="{ 'is-invalid': errors.neighborhood }">
                        <div v-if="errors.neighborhood" class="invalid-feedback">
                            {{ errors.neighborhood[0] }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="city">Cidade</label>
                        <input type="text" name="city" class="form-control"
                            v-model="form.address.city"
                            :class="{ 'is-invalid': errors.city }">
                        <div v-if="errors.city" class="invalid-feedback">
                            {{ errors.city[0] }}
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="state">Estado</label>
                        <input type="text" name="state" class="form-control"
                            v-model="form.address.state"
                            :class="{ 'is-invalid': errors.state }">
                        <div v-if="errors.state" class="invalid-feedback">
                            {{ errors.state[0] }}
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </fieldset>
        </form>
    </div>
</template>

<script>
    import api from '@/services/api';
    import cep from '@/services/cep';

    export default {
        data() {
            return {
                token: JSON.parse(window.localStorage.getItem('authUser')),
                errors: {},
                form: {
                    name: null,
                    email: null,
                    sex: null,
                    birth_date: null,
                    cell_phone: null,
                    father_name: null,
                    mother_name: null,
                    address: {
                        cep: null,
                        logradouro: null,
                        number: null,
                        complement: null,
                        neighborhood: null,
                        city: null,
                        state: null
                    }
                }
            }
        },

        created() {
            if (this.$route.params.id) {
                this.fetchUser();
            }
        },

        methods: {
            async fetchUser() {
                const { data } = await api.get(`user/${this.$route.params.id}`,
                    { 'headers': { 'Authorization': `Bearer ${this.token}` } });
                this.form.id           = data.id;
                this.form.name         = data.name;
                this.form.email        = data.email;
                this.form.sex          = data.sex;
                this.form.birth_date   = data.birth_date;
                this.form.cell_phone   = data.cell_phone;
                this.form.father_name  = data.father_name;
                this.form.mother_name  = data.mother_name;
                this.form.address      = data.address;

            },

            search() {
                if (/^[0-9]{8}$/.test(this.form.address.cep)) {
                    cep.get(`${this.form.address.cep}/json/`)
                        .then((res) => {
                            this.form.address.logradouro = res.data.logradouro;
                            this.form.address.neighborhood = res.data.bairro;
                            this.form.address.city = res.data.localidade;
                            this.form.address.state = res.data.uf;
                        })
                }
            },

            save(event) {
                event.preventDefault();

                if (this.form.id) {
                    this.update();
                    return;
                }

                this.create();
            },

            create() {
                api.post('users', this.form,
                    { 'headers': { 'Authorization': `Bearer ${this.token}` } })
                    .then(() => {
                    //     swal("Successo!", "Registro adicionado!", "success")
                    // .then((success) => {
                    //     if (success) {
                    //         this.$router.push('/')
                    //     }
                    // })
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors
                    }
                })
            },

            update() {
                api.put(`users/${this.form.id}`, this.form, 
                    { 'headers': { 'Authorization': `Bearer ${this.token}` } })
                    .then(() => {
                        // swal("Successo!", "Registro atualizado!", "success")
                        // .then((success) => {
                        //     if (success) {
                        //     this.$router.push('/')
                        //     }
                        // })
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors
                        }
                    })
            },
        }
    }
</script>
