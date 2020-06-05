<template>
    <div>
        <template v-if="images.length">
            <div class="mt-3 grid gap-2" :class="computeGridColumns">
                <div 
                    class="relative pb-2/3 rounded-lg overflow-hidden"
                    v-for="(image, index) in images"
                    :key="index"
                >
                    <img :src="image.url" alt="" class="absolute h-full w-full object-cover">
                </div>
            </div>
        </template>

        <template v-if="video">
            <div class="mt-3">
                <video :src="video.url" class="w-full rounded-lg focus:outline-none" preload controls></video>
            </div>
        </template>
    </div>
</template>

<script>
    import media from '../../mixins/media'

    export default {
        mixins: [
            media
        ]
    }
</script>