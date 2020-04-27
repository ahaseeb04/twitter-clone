<template>
    <div class="flex w-full space-x-3">
        <app-user-avatar 
            :avatar="tweet.user.avatar"
        />

        <div class="w-full">
            <app-tweet-username 
                :user="tweet.user"
            />

            <p class="whitespace-pre-wrap">{{ tweet.body }}</p>

            <app-tweet
                class="mt-3 border border-gray-700 rounded-lg" 
                :tweet="tweet.original_tweet"
            />

            <app-tweet-action-group 
                :tweet="tweet"
            />
        </div>
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