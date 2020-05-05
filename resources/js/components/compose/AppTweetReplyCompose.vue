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
                placeholder="Tweet your reply"
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
                            id="media-compose-reply"
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
                        class="px-4 py-3 font-semibold leading-none text-center rounded-full bg-blue-500 text-white transition-colors ease-in duration-75 hover:bg-blue-600 focus:outline-none"
                        :class="{
                            'opacity-50 pointer-events-none select-none': disableSubmitButton
                        }"
                    >
                        Reply
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import axios from 'axios'
    import { mapActions } from 'vuex'
    import compose from '../../mixins/compose'

    export default {
        mixins: [
            compose
        ],

        props: {
            tweet: {
                required: true,
                type: Object
            }
        },

        methods: {
            ...mapActions({
                replyToTweet: 'timeline/replyToTweet'
            }),

            async post () {
                await this.replyToTweet({
                    tweet: this.tweet,
                    data: this.form
                })

                this.$emit('success')
            }
        }
    }
</script>