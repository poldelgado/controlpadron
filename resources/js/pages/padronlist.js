import { createApp } from 'vue';


const app = createApp({});

app.component('padron-list', require('./PadronList.vue').default);

app.mount('#app');
