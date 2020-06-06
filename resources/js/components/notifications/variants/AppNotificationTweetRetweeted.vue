<template>
    <div class="w-full p-4">
        <app-user-avatar :avatar="notification.data.user.avatar" sm />

        <div class="mt-3 flex space-x-1">
            <app-tweet-username 
                :user="notification.data.user"
                hideUsername
            />

            <span>retweeted your tweet</span>
        </div>

        <div class="min-w-0 w-full">
            <app-notification-body :notification="notification" />

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