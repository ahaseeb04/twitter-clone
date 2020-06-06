<template>
    <div class="mb-4 relative">
        <video :src="generateVideoPreview(video)" class="rounded-lg focus:outline-none" preload controls></video>
    
        <app-tweet-compose-media-remove-button 
            :video="video"
            @removed="$emit('removed', video)"
        />
    </div>
</template>

<script>
    import media from '../../../mixins/media'

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
        },

        mixins: [
            media
        ]
    }
</script>