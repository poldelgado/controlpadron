<template>
    <div class="content">
        <table id="users" class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Apellido y Nombre</td>
                    <td>Email</td>
                    <td>Telefono</td>
                    <td>Estado</td>
                    <td>- - -</td>
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
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <modal-activate-users ref="modal">
            <template v-slot:body>
                <h2 v-if="selectedUser != null">
                    <strong># {{selectedUser.id}}</strong>
                    Apellido y Nombre: <strong>{{selectedUser.apellido_nombre}}</strong>
                </h2>
            </template>
            <template v-slot:footer>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button" @click.prevent="changeStatus(selectedUser)">
                       <strong>CAMBIAR</strong>
                    </button>
                </div>
            </template>
        </modal-activate-users>
    </div>
</template>

<script>
    import ModalActivateUsers from './Modal.vue';
    import DataTable from 'datatables';
    export default {
        components: {
            ModalActivateUsers,
        },
        props: ['users'],
        data() {
            return {
                selectedUser: null,
                errors: null,
            }
        },
        methods: {
            myTable() {
               $(function() {
                 $('#users').DataTable({
                    "language": {
                        "processing": "Procesando...",
                        "search": "Buscar",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "info": "Mostrando notificaciones de _START_ a _END_ de un total de _TOTAL_",
                        "zeroRecords": "No se encontraron resultados",
                        "emptyTable": "Ud. no tiene notificaciones.",
                        "infoEmpty": "No hay notificaciones disponibles",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "infoPostFix": "",
                        "infoThousands": ",",
                        "loadingRecords": "Cargando...",
                        "paginate": {
                            first: 'Primero',
                            previous: 'Anterior',
                            next: 'Siguiente',
                            last: 'Ultimo',
                        },
                        "aria": {
                            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                 });
               });
            },
            showModal(user, action) {
                this.selectedUser = user;
                this.$refs.modal.title = action === 'activar' ? 'ACTIVAR USUARIO':'DESACTIVAR USUARIO';
                this.$refs.modal.showModal();
            },
            hideModal() {
                this.$refs.modal.hideModal();
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
                    console.log(response);
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
                })
            },
        },
        mounted() {
            this.myTable();
        }

    }
</script>
