<template>
    <div>
        <table-users> </table-users>
    </div>
</template>

<script>
import TableUsers from '../components/TableUsers.vue';
export default {
    components: {
        TableUsers,
    },
    data() {
        return {
            hola: "hola mundo"
        };
    }
}
</script>
