<template>
    <div class="p-4">
        <app-user-avatar :avatar="notification.data.user.avatar" sm />

        <div class="mt-3 flex space-x-1">
            <app-tweet-username 
                :user="notification.data.user"
                hideUsername
            />

            <span>liked your tweet</span>
        </div>

        <p class="text-cool-gray-400">{{ notification.data.tweet.body }}</p>
    </div>
</template>

<script>
    export default {
        props: {
            notification: {
                required: true,
                type: Object
            }
        }
    }
</script>