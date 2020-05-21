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