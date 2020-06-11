<template>
    <div class="flex flex-col min-h-screen h-full">
        <app-header text="Latest tweets" />

        <div class="p-4 border-b-8" style="border-color: #212a39">
            <app-tweet-compose />
        </div>

        <template v-if="tweets.length">
            <div class="divide-y divide-gray-800">
                <app-tweet 
                    v-for="tweet in tweets"
                    :key="tweet.id"
                    :tweet="tweet"
                />
            </div>

            <div
                v-observe-visibility="{
                    callback: handleScrolledToBottomOfTimeline
                }"
            ></div>
        </template>
        <template v-else>
            <div class="h-full flex items-center justify-center">
                <template v-if="loading">
                    <app-loading-spinner />
                </template>
                <template v-else>
                    <p class="text-cool-gray-400">Your timeline is empty right now.</p>
                </template>
            </div>
        </template>
    </div>
</template>

<script>
    import { mapGetters, mapActions, mapMutations } from 'vuex'

    export default {
        data () {
            return {
                page: 1,
                lastPage: 1,
                loading: true
            }
        },

        computed: {
            ...mapGetters({
                tweets: 'timeline/tweets'
            }),

            urlWithPage () {
                return `/api/timeline?page=${this.page}`
            }
        },

        methods: {
            ...mapActions({
                getTweets: 'timeline/getTweets'
            }),

            ...mapMutations({
                PUSH_TWEETS: 'timeline/PUSH_TWEETS'
            }),

            loadTweets () {
                this.getTweets(this.urlWithPage).then((response) => {
                    this.lastPage = response.data.meta.last_page
                    this.loading = false
                })
            },

            handleScrolledToBottomOfTimeline (isVisible) {
                if (!isVisible) {
                    return
                }

                if (this.page === this.lastPage) {
                    return
                }

                this.page++

                this.loadTweets()
            }
        },

        mounted () {
            this.loadTweets()

            Echo.private(`timeline.${this.$user.id}`)
                .listen('.TweetWasCreated', (e) => {
                    this.PUSH_TWEETS([e])
                })
        }
    }
</script>