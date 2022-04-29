<template>
    <div class="content">
        <table id="users" class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Apellido y Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>- - -</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, key) in users" :key="key">
                    <td>{{ key + 1}}</td>
                    <td>{{ user.apellido_nombre }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.phone }}</td>
                    <td>{{ userStatus(user.enabled) }}</td>
                    <td>
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group" role="group">
                                <button v-if="user.enabled" class="btn btn-sm btn-danger" @click.prevent="showModal(user,'desactivar')">
                                    <strong><i class="bi bi-hand-thumbs-down"></i></strong>
                                </button>
                                <button
                                    v-else
                                    class="btn btn-sm btn-success"
                                    @click.prevent="showModal(user,'activar')">
                                    <strong><i class="bi bi-hand-thumbs-up"></i></strong>
                                </button>
                            </div>
                            <div class="btn-group ms-1" role="group" aria-label="user">
                                <button type="button" class="btn btn-sm btn-secondary" title="controlar punteo" @click="showModalUserAudit(user)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Modal Activar Usuario -->
        <modal
            ref="modal"
            idmodal="modaluser"
            sizemodal="modal-lg"
        >
            <template v-slot:body>
                <h2 v-if="selectedUser != null">
                    <strong># {{selectedUser.id}}</strong>
                    Apellido y Nombre: <strong>{{selectedUser.apellido_nombre}}</strong>
                </h2>
                <div v-if="isEmpadronadosInSelecteduser">
                    <h3>Llamo a:</h3>
                    <div class="text-center">
                        <ul class="list-group">
                            <li v-for="empadronado in selectedUser.empadronados" :key="empadronado.id" class="list-group-item">
                                <strong>{{empadronado.apellido+', '+empadronado.nombre+' DNI: '+empadronado.dni}}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </template>
            <template v-slot:footer>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button" @click.prevent="changeStatus(selectedUser)">
                       <strong>{{buttonTitle}}</strong>
                    </button>
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
        props: ['users'],
        data() {
            return {
                selectedUser: null,
                errors: null,
                buttonTitle: null,
            }
        },
        computed: {
        isSelectedUser() {
            if (this.selectedUser !== null) {
                return true;
            }
            return false;
        },
        isEmpadronadosInSelecteduser() {
            if (this.isSelectedUser) {
                console.log('hay un usuario seleccionado');
                if (this.selectedUser.empadronados.length > 0) {
                    console.log('el usuario tiene empadronados marcados');
                    return true;
                }
            }
            return false;
        }
    },
        methods: {
            showModal(user, action) {
                this.selectedUser = user;
                this.buttonTitle = action === 'activar' ? 'ACTIVAR USUARIO':'DESACTIVAR USUARIO';
                this.$refs.modal.title = this.buttonTitle;
                this.$refs.modal.showModal();
            },
            hideModal() {
                this.$refs.modal.hideModal();
                this.selectedUser = null;
            },
            showModalUserAudit(user) {
                this.selectedUser = user;
                this.$refs.modalAudit.showModal();
            },
            hideModalUserAudit() {
                this.$refs.modalAudit.hideModal();
                this.selectedUser = null;
            },
            userStatus(status) {
                return status ? 'ACTIVO':'NO ACTIVO';
            },
            changeStatus(user) {
                const url = baseURL + '/users/change_status/'+user.id;
                const status = !user.enabled;
                axios.post(url, {
                    status: status,
                }).then(response => {

                    if (response.data.success) {
                        user.enabled=status;
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
    }
</script>
