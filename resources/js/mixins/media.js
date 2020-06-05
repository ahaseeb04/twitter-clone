export default {
    props: {
        images: {
            required: false,
            type: Array
        },

        video: {
            required: false,
            type: Object
        }
    },

    computed: {
        computeGridColumns () {
            return {
                'grid-cols-2': this.images.length > 1
            }
        }
    }
}