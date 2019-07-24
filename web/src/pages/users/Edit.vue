<template>
    <div>
        <h2>Editar</h2>

        <router-link to="/" class="btn btn-dark mb-3">
            Voltar
        </router-link>

        <div class="card">
             <div class="card-body">
                <Form />
            </div>
        </div>
    </div>
</template>

<script>
    import Form from './Form'
    export default {
        components: {
            Form
        }
    }
</script>
