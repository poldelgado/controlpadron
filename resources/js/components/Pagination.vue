<template>
    <div>
        <nav>
            <ul v-if="links" class="pagination justify-content-center">
                <li v-for="link in links" :key="link.label">
                    <button class="page-link"
                            tabindex="-1"
                            :disabled="link.active"
                            @click.prevent="getEmpadronados(link.url)">
                            {{link.label}}
                    </button>

                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
export default {
    props: ['links'],
    methods: {
        getEmpadronados(url) {
            this.$parent.getEmpadronados(url);
        },
    },
}
</script>
