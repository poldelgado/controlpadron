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
        <modal-activate-users ref="modal"></modal-activate-users>
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
