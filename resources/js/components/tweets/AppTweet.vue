<template>
    <div class="w-full inline-block p-4 cursor-pointer">
        <div class="flex w-full space-x-3">
            <img :src="tweet.user.avatar" class="w-10 h-10 rounded-full object-cover">

            <div class="flex-grow w-full">
                <app-tweet-username 
                    :user="tweet.user"
                />

                <p class="whitespace-pre-wrap">{{ tweet.body }}</p>
            </div>
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