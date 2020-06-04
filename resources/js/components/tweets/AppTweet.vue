<template>
    <a :href="`/${tweet.user.username}/status/${tweet.uuid}`" class="w-full inline-block p-4 cursor-pointer transition-colors ease-in duration-75 hover:bg-gray-800">
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
        }
    }
</script>