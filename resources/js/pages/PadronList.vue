<template>
    <div>
        <h1>PADRON</h1>
        <table-padron :empadronados="empadronados"></table-padron>
    </div>
</template>
<script>
    import TablePadron from '../components/TablePadron.vue';
export default {
    components: {
        TablePadron,
    },
    props: ['url'],
    data() {
        return {
            empadronados: [],
        }
    },
    methods: {
        getEmpadronados() {
             axios.get(this.url).then(response => {
                this.empadronados = response.data.empadronados;
            });
        },
    },
    created() {
        this.getEmpadronados();
    }
}
</script>
