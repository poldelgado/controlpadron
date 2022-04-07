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
                    <td>{{ empadronado.id}}</td>
                    <td>{{ empadronado.apellido_nombre }}</td>
                    <td>{{ empadronado.dni }}</td>
                    <td>
                        <a v-if="!empadronado.is_llamado" href="#" class="text-decoration-none" @click.prevent="showModal(key)">
                            <i class="bi bi-telephone-plus-fill text-secondary iconos px-2"></i>
                        </a>
                        <a v-else class="text-decoration-none">
                            <i class="bi bi-check2 text-success iconos px-2"></i>
                        </a>
                    </td>
                    <td>
                        <div>
                            <a v-if="empadronado.intencion_voto===1"  href="#" @click.prevent="showModalIV(key)" class="text-decoration-none">
                                <i class="bi bi-question-circle-fill text-info iconos px-2"></i>
                            </a>
                            <a v-else class="text-decoration-none">
                                <i v-if="empadronado.intencion_voto===2" @click.prevent="showModalIV(key)" class="bi bi-hand-thumbs-up-fill text-success iconos px-2"></i>
                                <i v-if="empadronado.intencion_voto===3" @click.prevent="showModalIV(key)" class="bi bi-hand-thumbs-down-fill text-danger iconos px-2"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- modal registrar llamada -->
        <modal
            ref="modalLlamada"
            idmodal="modalllamada"
            sizemodal="modal-lg"
        >
        <template v-slot:body>
            <div>
                <h2 v-if="isSelectedEmpadronado">
                ¿Registrar llamada a <strong>{{selectedEmpadronado.apellido_nombre}}</strong>?
            </h2>
            <div v-if="isUsersInSelectedEmpadronado">
                <h3>Llamado por:</h3>
                <div class="text-center">
                    <ul class="list-group">
                        <li v-for="user in selectedEmpadronado.users" :key="user.id" class="list-group-item">
                            <strong>{{user.apellido_nombre}}</strong>
                        </li>
                    </ul>
                </div>
            </div>
            </div>


        </template>
        <template v-slot:footer>
            <button class="btn btn-primary" @click.prevent="submitLlamada">REGISTRAR</button>
        </template>
        </modal>
        <!-- modal intencion de voto -->
        <modal
            ref="modaliv"
            idmodal="modalintencion"
            sizemodal="modal-lg"
        >
        <template v-slot:body>
             <h2 v-if="selectedEmpadronado !=null">
                ¿Registrar intención de voto a <strong>{{selectedEmpadronado.apellido_nombre}}</strong>?
            </h2>
        </template>
        <template v-slot:footer>
           <div class="btn-toolbar" role="toolbar">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" @click.prevent="submitIV(3)" class="btn btn-danger">
                        VOTA OPOSICIÓN <i class="bi bi-hand-thumbs-down-fill iconos px-2"></i>
                    </button>
                </div>
                <div class="btn-group me-2" role="group">
                    <button type="button" @click.prevent="submitIV(2)" class="btn btn-success">
                        VOTA A FAVOR <i class="bi bi-hand-thumbs-up-fill iconos px-2"></i>
                    </button>
                </div>
            </div>
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
    computed: {
        isSelectedEmpadronado() {
            if (this.selectedEmpadronado !== null) {
                return true;
            }
            return false;
        },
        isUsersInSelectedEmpadronado() {
            if (this.isSelectedEmpadronado) {
                console.log('hay un empadronado seleccionado');
                if (this.selectedEmpadronado.users.length > 0) {
                    console.log('el selected empadronado tiene usuarios');
                    return true;
                }
            }
            return false;
        }
    },
    methods: {
        showModal(key) {
            this.selectedEmpadronado = this.empadronados[key];
            this.$refs.modalLlamada.showModal();
        },
        hideModal() {
                this.$refs.modalLlamada.hideModal();
                this.selectedEmpadronado = null;
            },
        showModalIV(key) {
            this.selectedEmpadronado = this.empadronados[key];
            this.$refs.modaliv.showModal();
        },
         hideModalIV() {
                this.$refs.modaliv.hideModal();
                this.selectedEmpadronado = null;
            },
        submitLlamada() {
            const urlLlamada = baseURL+'/padron/llamado/'+this.selectedEmpadronado.id;
            axios.post(urlLlamada, {
                llamado: true,
            }).then(response => {
                if (response.data.success) {
                    this.selectedEmpadronado.is_llamado = true,
                    this.$parent.numeros.llamados++;
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
        submitIV(intencion) {
            const urlIV = baseURL + '/padron/iv/'+this.selectedEmpadronado.id;
            axios.post(urlIV, {
                intencion: intencion,
            }).then(response => {
                if (response.data.success) {
                    this.asignarIntencion(this.selectedEmpadronado,intencion);
                    this.hideModalIV();
                    console.log(response.data.message);
                } else {
                    console.log("ERROR!!!: "+response.data.message);
                }
            }).catch(error => {
                    this.errors = error;
                    console.log(this.errors);
                });
        },
        asignarIntencion(empadronado, intencion) {
            switch(empadronado.intencion_voto) {
                case 1:
                        this.incrementarIntenciones(intencion);
                        break;
                case 2:
                        this.$parent.numeros.favor--;
                        this.incrementarIntenciones(intencion);
                        break;
                case 3:
                        this.$parent.numeros.contra--;
                        this.incrementarIntenciones(intencion);
            }
            empadronado.intencion_voto = intencion;
        },
        incrementarIntenciones(intencion) {
           if (intencion === 2) {
                this.$parent.numeros.favor++;
           } else if (intencion === 3) {
                this.$parent.numeros.contra++;
           }

        }

    },
    mounted() {

    }
}
</script>
