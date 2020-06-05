import axios from 'axios'

export default {
    data () {
        return {
            form: {
                body: '',
                media: []
            },

            media: {
                images: [],
                video: null,
                progress: 0
            },

            mediaTypes: {}
        }
    },

    computed: {
        disableComposeButton () {
            // The button should be disabled if the form body is empty
            // or if it exceeds the maximum limit, but if the user selects
            // an image or a video, then we want to enable it.
            if (this.formBodyIsEmpty || this.formBodyExceedsTheLimit) {
                if (this.userHasSelectedMedia) {
                    if (this.formBodyExceedsTheLimit) {
                        return true
                    }

                    return false
                }

                return true
            }
        },

        disableComposeMediaButton () {
            return this.fourImagesExist || this.videoExists
        },

        disableComposeButtonClasses () {
            return {
                'opacity-50 pointer-events-none select-none': this.disableSubmitButton
            }
        },

        disableComposeMediaButtonClasses () {
            return {
                'opacity-50 pointer-events-none select-none': this.disableComposeMediaButton
            }
        },

        formBodyIsEmpty () {
            return this.form.body.length === 0
        },

        formBodyExceedsTheLimit () {
            return this.form.body.length > 280
        },

        userHasSelectedMedia () {
            return this.media.images.length || this.media.video
        },

        fourImagesExist () {
            return this.media.images.length === 4
        },

        videoExists () {
            return this.media.video
        }
    },

    methods: {
        async submit () {
            if (this.userHasSelectedMedia) {
                let media = await this.uploadMedia()

                this.form.media = media.data.data.map(r => r.id)
            }

            await this.post()

            this.form.body = ''
            
            this.form.media = []
            this.media.images = []
            this.media.video = null
            this.media.progress = 0
        },

        async uploadMedia () {
            return await axios.post('/api/media', this.buildMediaForm(), {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },

                onUploadProgress: this.handleUploadProgress
            })
        },

        async getMediaTypes () {
            let response = await axios.get('/api/media/types')

            this.mediaTypes = response.data.data
        },

        buildMediaForm () {
            let form = new FormData()

            if (this.media.images.length) {
                this.media.images.forEach((image, index) => {
                    form.append(`media[${index}]`, image)
                })
            }

            if (this.media.video) {
                form.append('media[0]', this.media.video)
            }

            return form
        },

        handleMediaSelected (files) {
            Array.from(files).slice(0, 4).forEach((file) => {
                if (this.mediaTypes.image.includes(file.type)) {
                    this.media.images.push(file)
                }

                if (this.mediaTypes.video.includes(file.type)) {
                    this.media.video = file
                }
            })

            if (this.media.video) {
                this.media.images = []
            }
        },

        handleUploadProgress (event) {
            this.media.progress = parseInt(Math.round((event.loaded / event.total) * 100))
        },

        removeImage (image) {
            this.media.images = this.media.images.filter((i) => {
                return image !== i
            })
        },

        removeVideo () {
            this.media.video = null
        }
    },

    mounted () {
        this.getMediaTypes()
    }
}