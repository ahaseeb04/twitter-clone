<template>
    <div 
        class="grid gap-2 mb-5" 
        :class="{
            'grid-cols-2': images.length > 1
        }"
    >
        <div 
            class="relative pb-2/3 rounded-lg overflow-hidden"
            v-for="(image, index) in images"
            :key="index"
        >
            <img :src="generateImagePreview(image)" alt="" class="absolute h-full w-full object-cover">
        
            <a 
                href="#" 
                class="h-6 w-6 flex items-center justify-center absolute top-0 right-0 mt-3 mr-3 rounded-full bg-gray-900"
                @click.prevent="$emit('removed', image)"
            >
                <svg
                    class="w-3 stroke-current text-gray-200"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                >
                    <path 
                        d="M6 18L18 6M6 6l12 12"
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                    />
                </svg>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            images: {
                required: false,
                type: Array
            }
        },

        methods: {
            generateImagePreview (image) {
                return URL.createObjectURL(image)
            }
        }
    }
</script>