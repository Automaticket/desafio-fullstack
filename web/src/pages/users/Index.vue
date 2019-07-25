<template>
    <div>
        <template v-if="loading">
            <div class="text-center">
                Carregando, por favor aguarde...
            </div>
        </template>

        <template v-else>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>listagem de usuários</h2>

                <router-link class="btn btn-primary" :to="{ name: 'create' }">
                    Novo
                </router-link>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Sexo</th>
                        <th class="text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id">
                        <td>
                            {{ user.name }}
                        </td>
                        <td>
                            {{ user.email }}
                        </td>
                        <td>
                            {{ user.sex | sex }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <router-link class="btn btn-primary btn-sm"
                                    :to="{ name: 'edit', params: { id: user.id } }">
                                    Editar
                                </router-link>
                                <button type="button" class="btn btn-danger btn-sm ml-2"
                                    @click="confirmDelete(user)">
                                    Remover
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <paginate
                v-if="users.data.length"
                v-model="users.meta.current_page"
                :page-count="users.meta.per_page"
                :page-range="3"
                :margin-pages="4"
                :click-handler="navigate"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :prev-link-class="'page-link'"
                :next-link-class="'page-link'"
                :prev-class="'page-item'"
                :next-class="'page-item'"
                :container-class="'pagination justify-content-center'"
                :page-class="'page-item'"
                :page-link-class="'page-link'"
            />
        </template>
    </div>
</template>

<script>
    import api from '@/services/api';
    
    export default {
        filters: {
            sex(value) {
                if (value === 'm') {
                 return 'Masculino'
                }

                return 'Feminino'
            },
        },

        data() {
            return {
                loading: true,
                token: JSON.parse(window.localStorage.getItem('authUser')),
                users: {
                    data: [],
                    meta: []
                },
            }
        },

        created() {
            this.fetchUsers();
        },

        methods: {
            navigate(page) {
                this.fetchUsers(page);
            },

            fetchUsers(page = 1) {
                this.loading = true;
                api.get(`users?page=${page}`, { 'headers': { 'Authorization': `Bearer ${this.token}` } })
                    .then(({data}) => {
                    this.users.data = data.data;
                    this.users.meta = data.meta;
                    this.loading = false;
                })
            },

            confirmDelete(user) {
                swal({
                    title: "Você tem certeza?",
                    text: "Uma vez deletado, você não poderá recuperar este registro!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        this.delete(user)
                    }
                })
            },

            async delete(user) {
                await api.delete(`users/${user.id}`,
                    { 'headers': { 'Authorization': `Bearer ${this.token}` } } )
                    .then(() => {
                        swal("Registro excluído!", {
                            icon: "success",
                        });
                        this.fetchUsers();
                })
            }
        }
    }
</script>
