<template>
    <div class="flex-grow p-4">
        <app-user-avatar :avatar="notification.data.user.avatar" sm />

        <div class="mt-3 flex space-x-1">
            <app-tweet-username 
                :user="notification.data.user"
                hideUsername
            />

            <span>mentioned you in a tweet</span>
        </div>

        <div class="w-full">
            <p class="whitespace-pre-wrap text-cool-gray-400">{{ notification.data.tweet.body }}</p>

            <app-tweet-media :images="images" :video="video" />
        </div>
    </div>
</template>

<script>
    import notification from '../../../mixins/notification'

    export default {
        mixins: [
            notification
        ]
    }
</script>