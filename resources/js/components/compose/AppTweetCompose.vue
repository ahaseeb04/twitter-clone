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
                placeholder="What's happening?"
            />

            <div v-if="media.progress">
                <app-tweet-media-progress 
                    :progress="media.progress" 
                />
            </div>

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
                            :class="disableComposeMediaButtonClasses"
                        />
                    </li>
                </ul>

                <div class="flex items-center justify-end space-x-2">
                    <div>
                        <app-tweet-compose-limit 
                            :body="form.body"
                        />
                    </div>

                    <app-tweet-compose-button 
                        text="Tweet"
                        :class="disableComposeButtonClasses"
                    />
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import axios from 'axios'
    import compose from '../../mixins/compose'

    export default {
        methods: {
            async post () {
                await axios.post('/api/tweets', this.form)
            }
        },

        mixins: [
            compose
        ]
    }
</script>