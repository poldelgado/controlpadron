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
                    <td>{{ user.lastname + ', ' + user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.phone }}</td>
                    <td> - </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

    }
</script>
