import { createApp } from 'vue';

const app = createApp({});

app.component('user-list', require('./UserList.vue').default);

app.mount('#app');
