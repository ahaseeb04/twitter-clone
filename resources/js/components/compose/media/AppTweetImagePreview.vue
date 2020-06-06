<template>
    <div class="mb-4 grid gap-2" :class="computeGridColumns">
        <div 
            class="relative pb-2/3 rounded-lg overflow-hidden"
            v-for="(image, index) in images"
            :key="index"
        >
            <img :src="generateImagePreview(image)" alt="" class="absolute h-full w-full object-cover">
        
            <app-tweet-compose-media-remove-button 
                :image="image"
                @removed="$emit('removed', image)"
            />
        </div>
    </div>
</template>

<script>
    import media from '../../../mixins/media'

    export default {
        methods: {
            generateImagePreview (image) {
                return URL.createObjectURL(image)
            }
        },

        mixins: [
            media
        ]
    }
</script>