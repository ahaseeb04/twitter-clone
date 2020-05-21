<template>
    <div class="flex w-full space-x-3">
        <app-user-avatar 
            :avatar="tweet.user.avatar"
        />

        <div class="w-full">
            <app-tweet-username 
                :user="tweet.user"
            />

            <template v-if="tweet.parent_tweet">
                <div class="mb-2 text-sm text-cool-gray-400">
                    Replying to 
                    <span class="text-blue-500">@{{ tweet.parent_tweet.user.username }}</span>
                </div>
            </template>

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