<template>
    <span class="text-cool-gray-500" :title="formattedTimestamp">
        <time :datetime="timestamp">{{ time }}</time>
    </span>
</template>

<script>
    import moment from '../../moment'

    export default {
        props: {
            timestamp: {
                required: true,
                type: String
            }
        },

        computed: {
            formattedTimestamp () {
                return moment(this.timestamp)
                    .format("dddd, MMMM Do YYYY, h:mm:ss a")
            },

            time () {
                return moment(this.timestamp).fromNow()
            }
        },
    }
</script>