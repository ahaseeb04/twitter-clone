<template>
    <div>
        <template v-if="images.length">
            <div 
                class="grid gap-2 mt-3"
                :class="{
                    'grid-cols-2': images.length > 1
                }"
            >
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
    export default {
        props: {
            images: {
                required: false,
                type: Array
            },

            video: {
                required: false,
                type: Object
            }
        }
    }
</script>