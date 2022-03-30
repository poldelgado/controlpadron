<template>
    <li v-if="link" class="page-item disabled">
        <a class="page-link" :href="link.url" tabindex="-1" aria-disabled="true">{{link.value}}</a>
    </li>
</template>

<script>
export default {
    props: ['link'],
}
</script>
