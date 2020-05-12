<template>
    <div class="flex flex-col w-full p-4">
        <app-user-avatar :avatar="notification.data.user.avatar" sm />

        <div class="mt-3 flex space-x-1">
            <app-tweet-username 
                :user="notification.data.user"
                hideUsername
            />

            <span>liked your tweet</span>
        </div>

        <div class="w-full">
            <p class="text-cool-gray-400">{{ notification.data.tweet.body }}</p>

            <template v-if="images.length">
                <div 
                    class="grid gap-2 mt-3"
                    :class="{
                        'grid-cols-2': images.length > 1
                    }"
                >
                    <div 
                        class="relative pb-2/3 rounded-lg overflow-hidden"
                        v-for="(image, index) in images"
                        :key="index"
                    >
                        <img :src="image.url" alt="" class="absolute h-full w-full object-cover">
                    </div>
                </div>
            </template>

            <template v-if="video">
                <div class="mt-3">
                    <video :src="video.url" class="w-full rounded-lg focus:outline-none" preload controls></video>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            notification: {
                required: true,
                type: Object
            }
        },

        computed: {
            images () {
                return this.notification.data.tweet.media.data.filter(m => m.type === 'image')
            },

            video () {
                return this.notification.data.tweet.media.data.filter(m => m.type === 'video')[0]
            }
        }
    }
</script>