<template>
    <a
        href="#" 
        class="flex items-center text-base space-x-2" 
        @click="$emit('click', $event)"
    >
        <svg
            class="w-5 fill-current text-cool-gray-500"
            :class="{
                '!text-green-500': retweeted
            }"
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24"
        >
            <path 
                d="M5.41 16H18a2 2 0 002-2 1 1 0 012 0 4 4 0 01-4 4H5.41l2.3 2.3a1 1 0 01-1.42 1.4l-4-4a1 1 0 010-1.4l4-4a1 1 0 111.42 1.4L5.4 16zM6 8a2 2 0 00-2 2 1 1 0 01-2 0 4 4 0 014-4h12.59l-2.3-2.3a1 1 0 111.42-1.4l4 4a1 1 0 010 1.4l-4 4a1 1 0 01-1.42-1.4L18.6 8H6z"
            />
        </svg>

        <span 
            class="text-cool-gray-500"
            :class="{
                '!text-green-500': retweeted
            }"
        >
            {{ tweet.retweets_count }}
        </span>
    </a>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        },

        computed: {
            ...mapGetters({
                retweets: 'retweets/retweets'
            }),

            retweeted () {
                return this.retweets.includes(this.tweet.id)
            }
        }
    }
</script>