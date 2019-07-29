<template>
    <div>
        <section class="content-header">
            <h1>
                Usuários
            </h1>
        </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <a href="/users/create" class="btn btn-primary" style="margin-bottom: 15px;">Novo Usuário</a>

                <div class="box">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th class="text-center">Data de alteração</th>
                                <th class="text-center">Ações</th>
                            </tr>
                            </thead>

                            <tbody>

                                <tr v-for="user in users" v-bind:key="user.id">
                                    <td>{{user.name}}</td>
                                    <td>{{user.email}}</td>
                                    <td class="text-center">{{user.updated_at}}</td>
                                    <td class="text-center">
                                        <a href="#" @click="remove($event, user)" class="btn btn-danger btn-xs" title="Remover"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <Pagination :links="this.links" :meta="this.meta" @navigate="navigate"></Pagination>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    </div>
</template>
<script>

    import http from '../../http'
    import Pagination from '../../components/Pagination'

    export default {
        components: {
            Pagination
        },
        data : function() {
            return {
                users : [],
                user : {},
                links : {},
                meta: {}
                
            }
        },
        methods : {
            getAll: function() {
                http.get('/user').then((res) => {
                    this.users = res.data.data;
                    this.links = res.data.links;
                    this.meta = res.data.meta;
                }).catch(

                );
            },

            remove(ev, user) {
                ev.preventDefault();

                http.delete('/user/' + user.id).then((res) => {
                    this.users.splice(this.users.indexOf(user), 1);
                }).catch(

                );
            },

            navigate(page) {
                 http.get('/user?page=' + page).then((res) => {
                    this.users = res.data.data;
                    this.links = res.data.links;
                    this.meta = res.data.meta;
                }).catch(

                );
            }
        },
        mounted: function(){
            this.getAll();
        }
    }

</script>