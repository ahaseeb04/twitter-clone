<template>
    <div class="divide-y divide-gray-800">
        <app-tweet
            v-for="parent in parents(id)"
            :tweet="parent"
            :key="parent.id"
        />

        <app-tweet
            v-if="tweet(id)"
            :tweet="tweet(id)"
        />
        
        <app-tweet
            v-for="reply in replies(id)"
            :tweet="reply"
            :key="reply.id"
        />
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        props: {
            id: {
                required: true,
                type: String
            },

            uuid: {
                required: true,
                type: String
            }
        },

        computed: {
            ...mapGetters({
                tweet: 'conversation/tweet',
                parents: 'conversation/parents',
                replies: 'conversation/replies',
            })
        },

        methods: {
            ...mapActions({
                getTweets: 'conversation/getTweets'
            })
        },

        mounted () {
            this.getTweets(`/api/tweets/${this.id}`)
            this.getTweets(`/api/tweets/${this.id}/replies`)
        }
    }
</script>