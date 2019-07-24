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
                    <input type="text" name="birth_date" class="form-control"
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

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" class="form-control"
                        v-model="form.address.cep">
                </div>

                <!-- <div class="form-group">
                    <label for="">Logradouro</label>
                    <input type="text" name="logradouro" class="form-control"
                    v-model="form.logradouro">
                </div>

                <div class="form-group">
                    <label for="">Número</label>
                    <input type="text" name="numero" class="form-control"
                    v-model="form.numero" :class="{ 'is-invalid': errors.numero }">
                    <div v-if="errors.numero" class="invalid-feedback">
                    {{ errors.numero[0] }}
                    </div>
                </div> -->

                <div class="text-right">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </fieldset>
        </form>
    </div>
</template>

<script>
    import api from '@/services/api';

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
                    address: {
                        cep: null,
                    },
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
                this.form.id = data.id;
                this.form.name = data.name;
                this.form.email = data.email;
                this.form.sex = data.sex;
                this.form.birth_date = data.birth_date;
                this.form.cell_phone = data.cell_phone;
                this.form.father_name = data.father_name;
                this.form.mother_name = data.mother_name;
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
