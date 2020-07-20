<template>
    <div class="flex w-full space-x-3">
        <app-user-avatar 
            :avatar="tweet.user.avatar"
        />

        <div class="min-w-0 w-full">
            <div class="flex items-center space-x-1">
                <app-tweet-username 
                    :user="tweet.user"
                />

                <span class="block text-xs text-cool-gray-500">&bull;</span>

                <app-tweet-time-ago 
                    :tweet="tweet" 
                />
            </div>

            <app-tweet-body :tweet="tweet" />

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