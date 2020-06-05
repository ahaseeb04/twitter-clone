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
                placeholder="Add a comment"
            />
        
            <div class="flex justify-between items-center">
                <ul class="flex items-center space-x-4">
                    <!--  -->
                </ul>

                <div class="flex items-center justify-end space-x-2">
                    <div>
                        <app-tweet-compose-limit 
                            :body="form.body"
                        />
                    </div>

                    <app-tweet-compose-button 
                        text="Retweet"
                        :class="disableComposeButtonClasses"
                    />
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
                quoteTweet: 'timeline/quoteTweet'
            }),

            async post () {
                await this.quoteTweet({
                    tweet: this.tweet,
                    data: this.form
                })

                this.$emit('success')
            }
        }
    }
</script>