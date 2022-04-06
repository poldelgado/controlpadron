<template>
    <div>
        <section>
            <Carrousel />
        </section>
        <section v-if="mostrarNumeros" class="d-flex justify-content-around row mb-3">
            <div class="col-6 col-md-3">
                <CardResultado
                    tipo="Padrón"
                    :total="numeros.total"
                    add-color="text-primary"
                 />
            </div>
            <div class="col-6 col-md-3">
                <CardResultado
                    tipo="Llamados"
                    :total="numeros.llamados"
                    add-color="text-info"
                 />
            </div>
            <div class="col-6 col-md-3">
                <CardResultado
                    tipo="a Favor"
                    :total="numeros.favor"
                    add-color="text-success"
                 />
            </div>
            <div class="col-6 col-md-3">
                <CardResultado
                    tipo="en Contra"
                    :total="numeros.contra"
                    add-color="text-danger"
                />
            </div>
        </section>
        <section class="card shadow-sm mb-3">
            <SearchBar />
        </section>
        <section v-if="empadronados" class="card shadow-sm mtb-3 py-3">
            <TablePadron
             :empadronados="empadronados.data"
            />
        </section>
        <section v-if="empadronados" class="card shadow-sm mtb-3 py-3">
            <Pagination
                :links="empadronados.meta.links" />
        </section>
    </div>
</template>
<script>
    import Carrousel from '../components/Carrousel.vue';
    import TablePadron from '../components/TablePadron.vue';
    import CardResultado from '../components/CardResultado.vue';
    import SearchBar from '../components/SearchBar.vue';
    import Pagination from '../components/Pagination.vue';

export default {
    components: {
        Carrousel,
        TablePadron,
        CardResultado,
        SearchBar,
        Pagination,
    },
    props: ['url','urlNumeros','urlBanner','urlBannerEstamento','admin'],
    data() {
        return {
            empadronados: null,
            numeros: null,
        }
    },
    computed: {
        mostrarNumeros() {
            if (this.empadronados !== null && this.admin) {
                return true;
            }
            return false;
        },
    },
    methods: {
        getEmpadronados(url,filter = null) {
            if (filter !== null) {
                url = url+'/'+filter;
            }
             axios.get(url).then(response => {
                this.empadronados = response.data;
                if (response.data.meta !== null || response.data.meta !== undefined) {
                    response.data.meta.links[0].label="Previo";
                    response.data.meta.links[response.data.meta.links.length - 1].label="Próximo";
                }
            });
        },
        getNumeros(urlNumeros) {
            axios.get(urlNumeros).then(response => {
                this.numeros = response.data;
            });
        },
    },
    created() {
        this.getNumeros(this.urlNumeros);
        this.getEmpadronados(this.url);
    }
}
</script>
