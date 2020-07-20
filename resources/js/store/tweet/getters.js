export default {
    tweets (state) {
        return state.tweets
            .sort((a, b) => b.created_at_timestamp - a.created_at_timestamp)
    },

    tweet (state) {
        return id => state.tweets.find(t => t.id === id)
    },

    tweetByUuid (state) {
        return uuid => state.tweets.find(t => t.uuid === uuid)
    }
}