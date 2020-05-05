<template>
    <a 
        href="#" 
        class="flex items-center text-base space-x-2"
        @click.prevent="$modal.show(AppTweetReplyModal, { tweet })"
    >
        <svg
            class="w-5 fill-current text-cool-gray-500"
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24"
        >
            <path 
                d="M2 15V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v15a1 1 0 0 1-1.7.7L16.58 17H4a2 2 0 0 1-2-2zM20 5H4v10h13a1 1 0 0 1 .7.3l2.3 2.29V5z"
            />
        </svg>

        <span class="text-cool-gray-500">
            {{ tweet.replies_count }}
        </span>
    </a>
</template>

<script>
    import AppTweetReplyModal from '../../modals/AppTweetReplyModal'

    export default {
        data () {
            return {
                AppTweetReplyModal
            }
        },

        props: {
            tweet: {
                required: true,
                type: Object
            }
        }
    }
</script>