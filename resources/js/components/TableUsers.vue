<template>
    <div class="content">
        <table id="users" class="table">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Apellido y Nombre</td>
                    <td>Email</td>
                    <td>Telefono</td>
                    <td>- - -</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, key) in users" :key="key">
                    <td>{{ key + 1}}</td>
                    <td>{{ user.apellido_nombre }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.phone }}</td>
                    <td> <button class="btn btn-primary" @click.prevent="showModal(key)">abrir</button></td>
                </tr>
            </tbody>
        </table>
        <modal-activate-users ref="modal" :title="modalTitle">
            <template v-slot:body>
                <h2 v-if="selectedUser != null">
                    Apellido y Nombre: <strong>{{selectedUser.apellido_nombre}}</strong>
                </h2>
            </template>
            <template v-slot:footer>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button">
                       <strong>CAMBIAR</strong>
                    </button>
                </div>
            </template>
        </modal-activate-users>
    </div>
</template>

<script>
    import ModalActivateUsers from './ModalActivateUsers.vue';
    export default {
        components: {
            ModalActivateUsers,
        },
        props: ['users'],
        data() {
            return {
                selectedUser: null,
            }
        },
        computed: {
            modalTitle() {
                return this.selectedUser ? 'Cambiar Estado a: '+ this.selectedUser.apellido_nombre:'';
                }
        },
        methods: {
            showModal(key) {
                this.selectedUser = this.users[key];
                this.$refs.modal.showModal();
            },
            hideModal() {
                this.$refs.modal.hideModal();
                this.selectedUser = null;
            },
        },

    }
</script>
