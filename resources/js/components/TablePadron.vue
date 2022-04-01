<template>
    <div class="content">
        <table id="empadronados" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Apellido/s y Nombre/s</th>
                    <th scope="col">D.N.I.</th>
                    <th scope="col">Llamado</th>
                    <th scope="col">Intención de Voto</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(empadronado, key) in empadronados" :key="key">
                    <td>{{ key + 1}}</td>
                    <td>{{ empadronado.apellido_nombre }}</td>
                    <td>{{ empadronado.dni }}</td>
                    <td>
                        <a v-if="!empadronado.llamado" href="#" class="text-decoration-none" @click.prevent="showModal(key)">
                            <i class="bi bi-telephone-plus-fill text-secondary iconos px-2"></i>
                        </a>
                        <a v-else class="text-decoration-none" @click.prevent="showModal(key)">
                            <i class="bi bi-telephone text-success iconos px-2"></i>
                        </a>

                    </td>
                    <td>
                        <div>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-hand-thumbs-up-fill text-success iconos px-2"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-hand-thumbs-down-fill text-danger iconos px-2"></i>
                            </a>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-question-circle-fill text-info iconos px-2"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <modal
            ref="modalLlamada"
            idmodal="modalllamada"
            sizemodal="modal-lg"
        >
        <template v-slot:body>
            <h2 v-if="selectedEmpadronado !=null">
                ¿Registrar llamada a <strong>{{selectedEmpadronado.apellido_nombre}}</strong>?
            </h2>
        </template>
        <template v-slot:footer>
            <button class="btn btn-primary" @click.prevent="submitLlamada">REGISTRAR</button>
        </template>
        </modal>

    </div>
</template>

<script>
import Modal from './Modal.vue';
export default {
    components: {
        Modal,
    },
    props: ['empadronados'],
    data() {
        return {
            selectedEmpadronado: null,
        }
    },
    methods: {
        showModal(key) {
            this.selectedEmpadronado = this.empadronados[key];
            this.$refs.modalLlamada.showModal();
        },
        hideModal() {
                this.$refs.modal.hideModal();
                this.selectedEmpadronado = null;
            },
        submitLlamada() {
            const urlLlamada = baseURL+'/padron/llamada/'+this.selectedEmpadronado.id;
            axios.post(urlLlamada, {
                llamada: true,
            }).then(response => {
                if (response.data.success) {
                    this.selectedEmpadronado.llamada = true,
                    console.log(response.data.message);
                    this.hideModal();

                } else {
                    console.log(response.data.message);
                }
            }).catch(error => {
                    this.errors = error;
                    console.log(this.errors);
                });
        },
    },
    mounted() {

    }
}
</script>
