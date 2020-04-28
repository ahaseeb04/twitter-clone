<template>
    <form 
        class="flex space-x-3"
        @submit.prevent="submit" 
    >
        <app-user-avatar 
            :avatar="$user.avatar"
        />

        <div class="flex-grow space-y-2">
            <app-tweet-compose-textarea 
                v-model="form.body"
            />

            <div v-if="media.images.length">
                <app-tweet-image-preview
                    :images="media.images"
                    @removed="removeImage"
                />
            </div>

            <div v-if="media.video">
                <app-tweet-video-preview
                    :video="media.video"
                    @removed="removeVideo"
                />
            </div>
        
            <div class="flex justify-between items-center">
                <ul class="flex items-center space-x-4">
                    <li>
                        <app-tweet-compose-media-button 
                            @selected="handleMediaSelected"
                            id="media-compose"
                            :class="{
                                'opacity-50 pointer-events-none select-none': media.images.length === 4 || media.video
                            }"
                        />
                    </li>
                </ul>

                <div class="flex items-center justify-end space-x-2">
                    <div>
                        <app-tweet-compose-limit 
                            :body="form.body"
                        />
                    </div>

                    <button
                        type="submit" 
                        class="px-4 py-3 font-semibold leading-none text-center rounded-full bg-blue-500 text-white"
                        :class="{
                            'opacity-50 pointer-events-none select-none': form.body.length > 280
                        }"
                    >
                        Tweet
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import axios from 'axios'

    export default {
        data () {
            return {
                form: {
                    body: '',
                    media: []
                },

                media: {
                    images: [],
                    video: null
                },

                mediaTypes: {}
            }
        },

        methods: {
            async submit () {
                await axios.post('/api/tweets', this.form)

                this.form.body = ''
            },

            async getMediaTypes () {
                let response = await axios.get('/api/media/types')

                this.mediaTypes = response.data.data
            },

            handleMediaSelected (files) {
                Array.from(files).slice(0, 4).forEach((file) => {
                    if (this.mediaTypes.image.includes(file.type)) {
                        this.media.images.push(file)
                    }

                    if (this.mediaTypes.video.includes(file.type)) {
                        this.media.video = file
                    }
                })

                if (this.media.video) {
                    this.media.images = []
                }
            },

            removeImage (image) {
                this.media.images = this.media.images.filter((i) => {
                    return image !== i
                })
            },

            removeVideo () {
                this.media.video = null
            }
        },

        mounted () {
            this.getMediaTypes()
        }
    }
</script>