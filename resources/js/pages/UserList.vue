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
    props: ['url'],
    data() {
        return {
            users: [],
        };
    }
}
</script>
