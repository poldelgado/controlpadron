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
        <section class="card shadow-sm mb-3">
            <SearchBar />
        </section>
        <section class="card shadow-sm mtb-3 py-3">
            <TablePadron
             :empadronados="empadronados.data"
            />
        </section>
    </div>
</template>
<script>
    import TablePadron from '../components/TablePadron.vue';
    import CardResultado from '../components/CardResultado.vue';
    import SearchBar from '../components/SearchBar.vue';

export default {
    components: {
        TablePadron,
        CardResultado,
        SearchBar,
    },
    props: ['url'],
    data() {
        return {
            empadronados: {
                data: [],
                links: null,
                meta: null,
                },
        }
    },
    methods: {
        getEmpadronados() {
             axios.get(this.url).then(response => {
                this.empadronados.data = response.data.data;
                this.empadronados.links = response.data.links;
                this.empadronados.meta = response.data.meta;
            });
        },
    },
    created() {
        this.getEmpadronados();
    }
}
</script>
