<template>
    <div class="flex w-full space-x-3">
        <template v-if="verticalBorderBetweenAvatars">
            <div class="flex-shrink-0">
                <app-user-avatar 
                    :avatar="tweet.user.avatar"
                />

                <div class="w-10 h-full flex justify-center">
                    <div class="w-3px h-full bg-gray-700"></div>
                </div>
            </div>
        </template>
        <template v-else>
            <app-user-avatar 
                :avatar="tweet.user.avatar"
            />
        </template>

        <div class="min-w-0 w-full">
            <div class="flex justify-between">
                <div class="flex items-center space-x-1">
                    <app-tweet-username 
                        :user="tweet.user"
                    />

                    <span class="block text-xs text-cool-gray-500">&bull;</span>

                    <app-time-ago 
                        :timestamp="tweet.created_at" 
                    />
                </div>

                <div class="flex">
                    <app-tweet-settings :tweet="tweet" />
                </div>
            </div>

            <app-tweet-replying-to
                v-if="tweet.replying_to"
                :tweet="tweet" 
            />

            <app-tweet-body :tweet="tweet" />

            <app-tweet-media :images="images" :video="video" />

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
            },

            verticalBorderBetweenAvatars: {
                required: false,
                type: Boolean
            }
        },

        computed: {
            images () {
                return this.tweet.media.data.filter(m => m.type === 'image')
            },

            video () {
                return this.tweet.media.data.filter(m => m.type === 'video')[0]
            }
        }
    }
</script>