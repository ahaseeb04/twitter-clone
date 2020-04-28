<template>
    <ul class="mt-4 flex md:space-x-24">
        <li class="w-3/12 md:w-auto">
            <app-tweet-reply-action />
        </li>

        <li class="w-3/12 md:w-auto">
            <app-tweet-retweet-action 
                :tweet="tweet"
            />
        </li>
        
        <li class="w-3/12 md:w-auto">
            <app-tweet-like-action 
                :tweet="tweet"
            />
        </li>
    </ul>
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