<template>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" :src="$parent.urlBannerEstamento" alt="ESTAMENTO">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" :src="$parent.urlBanner" alt="DECANO-VICEDECANO">
            </div>
        </div>
    </div>
</template>
