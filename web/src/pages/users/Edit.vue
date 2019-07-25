<template>
    <div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Editar</h2>

            <router-link to="/" class="btn btn-dark mb-3">
                Voltar
            </router-link>
        </div>

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
