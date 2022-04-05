<template>
    <div>
        <form class="d-flex px-3 py-4" @submit.prevent="submit(filter)">
            <input class="form-control form-control-lg border border-secondary me-3 text-secondary"
                type="text"
                placeholder="Buscar por Nombre, Apellido o DNI"
                v-model="filter"
            />
            <button class="btn btn-primary btn-lg" type="submit">BUSCAR</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            filter: null,
        };
    },
    methods: {
        submit(filter) {
            this.$parent.getEmpadronados(this.$parent.url,filter);
        }
    },
}
</script>
