<template>
    <div class="h-full">
        <template v-if="notifications.length">
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
        </template>
        <template v-else>
            <div class="h-full flex items-center justify-center">
                <template v-if="loading">
                    <app-loading-spinner />
                </template>
                <template v-else>
                    <p class="text-cool-gray-400">Your notifications are empty right now.</p>
                </template>
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
                lastPage: 1,
                loading: true
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
                    this.loading = false
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