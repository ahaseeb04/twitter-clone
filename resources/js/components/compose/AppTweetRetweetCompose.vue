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

                    <button
                        type="submit" 
                        class="px-4 py-3 font-semibold leading-none text-center rounded-full bg-blue-500 text-white transition-colors ease-in duration-75 hover:bg-blue-600 focus:outline-none"
                        :class="{
                            'opacity-50 pointer-events-none select-none': disableSubmitButton
                        }"
                    >
                        Retweet
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