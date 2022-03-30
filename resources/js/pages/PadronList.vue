<template>
    <div>
        <section class="d-flex justify-content-around row mb-3">
            <div class="col-6 col-md-3">
                <CardResultado
                    tipo="Padrón"
                    total="3145"
                    add-color="text-primary"
                 />
            </div>
            <div class="col-6 col-md-3">
                <CardResultado
                    tipo="Llamados"
                    total="1389"
                    add-color="text-info"
                 />
            </div>
            <div class="col-6 col-md-3">
                <CardResultado
                    tipo="a Favor"
                    total="951"
                    add-color="text-success"
                 />
            </div>
            <div class="col-6 col-md-3">
                <CardResultado
                    tipo="en Contra"
                    total="420"
                    add-color="text-danger"
                 />
            </div>
        </section>
        <table-padron :empadronados="empadronados"></table-padron>
    </div>
</template>
<script>
    import TablePadron from '../components/TablePadron.vue';
    import CardResultado from '../components/CardResultado.vue';
export default {
    components: {
        TablePadron,
        CardResultado,
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
