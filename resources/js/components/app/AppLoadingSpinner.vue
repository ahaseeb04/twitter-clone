<template>
    <div class="spinner"></div>
</template>

<style lang="scss" scoped>
    .spinner {
        animation: spinner .6s linear infinite;
        border-radius: 100%;
        border-right: 2px solid transparent;
        border-top: 2px solid #3f83f8;
        height: 40px;
        width: 40px;
    }

    @keyframes spinner {
        to {
            transform: rotate(360deg);
        }
    }
</style>