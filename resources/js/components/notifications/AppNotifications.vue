<template>
    <div>
        <div class="divide-y divide-gray-800">
            <app-notification 
                v-for="notification in notifications"
                :key="notification.id"
                :notification="notification"
            />
        </div>

        <template v-if="notifications.length">
            <div
                v-observe-visibility="{
                    callback: handleScrolledToBottomOfNotifications
                }"
            >
                <!--  -->
            </div>
        </template>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        data () {
            return {
                page: 1,
                lastPage: 1
            }
        },

        computed: {
            ...mapGetters({
                notifications: 'notifications/notifications'
            }),

            urlWithPage () {
                return `/api/notifications?page=${this.page}`
            }
        },

        methods: {
            ...mapActions({
                getNotifications: 'notifications/getNotifications'
            }),

            loadNotifications () {
                this.getNotifications(this.urlWithPage).then((response) => {
                    this.lastPage = response.data.meta.last_page
                })
            },

            handleScrolledToBottomOfNotifications (isVisible) {
                if (!isVisible) {
                    return
                }

                if (this.page === this.lastPage) {
                    return
                }

                this.page++

                this.loadTweets()
            }
        },

        mounted () {
            this.loadNotifications()
        }
    }
</script>