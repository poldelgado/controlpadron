<template>
    <div>
        <table-users :users="users"></table-users>
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
    },
    methods: {
        getUsers() {
            axios.get(this.url).then(response => {
                this.users = response.data.users;
            });

        }
    },
    created() {
        this.getUsers();
    }
}
</script>
