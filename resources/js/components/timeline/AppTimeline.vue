<template>
    <div>
        <div class="divide-y divide-gray-800">
            <app-tweet 
                v-for="tweet in tweets"
                :key="tweet.id"
                :tweet="tweet"
            />
        </div>

        <template v-if="tweets.length">
            <div
                v-observe-visibility="{
                    callback: handleScrolledToBottomOfTimeline
                }"
            >
                <!--  -->
            </div>
        </template>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        data () {
            return {
                page: 1,
                lastPage: 1
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

            loadTweets () {
                this.getTweets(this.urlWithPage).then((response) => {
                    this.lastPage = response.data.meta.last_page
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
        }
    }
</script>