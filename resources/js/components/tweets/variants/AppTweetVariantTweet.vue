<template>
    <div class="flex w-full space-x-3">
        <app-user-avatar 
            :avatar="tweet.user.avatar"
        />

        <div class="w-full">
            <app-tweet-username 
                :user="tweet.user"
            />

            <p class="whitespace-pre-wrap">{{ tweet.body }}</p>

            <template v-if="images.length">
                <div 
                    class="grid gap-2 mt-3 mb-5"
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
                <div class="mt-3 mb-5">
                    <video :src="video.url" class="w-full rounded-lg focus:outline-none" preload controls></video>
                </div>
            </template>

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