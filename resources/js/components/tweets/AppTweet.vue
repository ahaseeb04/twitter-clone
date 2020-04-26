<template>
    <div class="w-full inline-block p-4 cursor-pointer">
        <div class="flex w-full space-x-3">
            <app-user-avatar 
                :avatar="tweet.user.avatar"
            />

            <div class="w-full">
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