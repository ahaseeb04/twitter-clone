<template>
    <div class="flex-grow">
        <template v-if="resolvedTweet">
            <app-tweet :tweet="resolvedTweet" />
        </template>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        props: {
            notification: {
                required: true,
                type: Object
            }
        },

        computed: {
            ...mapGetters({
                tweet: 'notifications/tweet'
            }),

            resolvedTweet () {
                return this.tweet(this.notification.data.tweet.id)
            }
        }
    }
</script>