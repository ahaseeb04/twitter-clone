<template>
    <a :href="href" class="w-full inline-block p-4 cursor-pointer transition-colors ease-in duration-75 hover:bg-gray-800">
        <component 
            :is="`app-tweet-variant-${tweet.type}`"
            :tweet="tweet"
        />
    </a>
</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        },

        computed: {
            href () {
                return this.tweet.type === 'retweet'
                    ? `/${this.tweet.original_tweet.user.username}/status/${this.tweet.original_tweet.uuid}`
                    : `/${this.tweet.user.username}/status/${this.tweet.uuid}`
            }
        }
    }
</script>