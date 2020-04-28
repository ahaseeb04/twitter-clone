<template>
    <div class="relative mb-5">
        <video :src="generateVideoPreview(video)" class="rounded-lg focus:outline-none" preload controls></video>
    
        <a 
            href="#" 
            class="h-6 w-6 flex items-center justify-center absolute top-0 right-0 mt-3 mr-3 rounded-full bg-gray-900"
            @click.prevent="$emit('removed', video)"
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
</template>

<script>
    export default {
        props: {
            video: {
                required: true,
                type: File
            }
        },

        methods: {
            generateVideoPreview (video) {
                return URL.createObjectURL(video)
            }
        }
    }
</script>