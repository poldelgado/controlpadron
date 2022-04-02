<template>
    <div class="card text-center shadow-sm my-1 mx-1 ">
        <div class="p-3">
            <h3 class="fw-bold">Total</h3>
            <h3 class="fw-bold" :class="addColor">{{tipo}}</h3>
            <h3 class="card-text display-3 cardData" :class="addColor">{{total}}</h3>
        </div>
    </div>
</template>

<script>
export default {
    props: ['tipo','total','addColor'],

}
</script>
