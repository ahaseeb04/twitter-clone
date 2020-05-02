<template>
    <div class="space-y-4">
        <template v-if="tweet">
            <app-tweet-retweet-compose 
                :tweet="tweet"
                @success="$emit('close')"
            />

            <app-tweet-variant-tweet
                class="p-4 border border-gray-700 rounded-lg"
                :tweet="tweet"
            />
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        }
    }
</script>