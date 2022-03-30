<template>
    <div class="card text-center shadow-sm my-1 mx-1 ">
        <div class="p-3">
            <h3 class="fw-bold">Total</h3>
            <h3 class="text-info fw-bold">{{tipo}}}</h3>
            <h3 class="card-text display-3 cardData">{{total}}</h3>
        </div>
    </div>
</template>

<script>
export default {
    props: ['tipo','total','color-class']
}
</script>
