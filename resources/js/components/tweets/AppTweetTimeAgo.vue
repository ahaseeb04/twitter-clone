<template>
    <div class="text-cool-gray-500">
        {{ time }}
    </div>
</template>

<script>
    import moment from '../../moment'

    export default {
        data () {
            return {
                time: moment(this.tweet.created_at).fromNow()
            }
        },

        props: {
            tweet: {
                required: true,
                type: Object
            }
        },

        created () {
            setInterval(() => {
                this.time = moment(this.tweet.created_at).fromNow()
            }, 9000)
        }
    }
</script>