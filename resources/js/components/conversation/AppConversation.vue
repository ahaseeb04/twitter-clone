<template>
    <div>
        <div>
            Lorem ipsum dolor sit amet.
        </div>
        <div class="border border-gray-800 border-l-0 border-r-0">
            <app-tweet
                v-if="tweetByUuid(uuid)"
                :tweet="tweetByUuid(uuid)"
            />
        </div>
        <div>
            Lorem, ipsum.
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        props: {
            uuid: {
                required: true,
                type: String
            }
        },

        computed: {
            ...mapGetters({
                tweetByUuid: 'conversation/tweetByUuid'
            })
        },

        methods: {
            ...mapActions({
                getTweets: 'conversation/getTweets'
            })
        },

        mounted () {
            this.getTweets(`/api/tweets/${this.uuid}`)
        }
    }
</script>