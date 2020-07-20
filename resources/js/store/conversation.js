import actions from './tweet/actions'
import mutations from './tweet/mutations'

export default {
    namespaced: true,

    state: {
        tweets: []
    },

    getters: {
        tweet (state) {
            return id => state.tweets.find(t => t.id == id)
        },

        parents (state) {
            return id => state.tweets.filter(t => {
                return t.id != id && !t.parent_ids.includes(parseInt(id))
            })
                .sort((a, b) => a.created_at_timestamp - b.created_at_timestamp)
        },

        replies (state) {
            return id => state.tweets.filter(t => t.parent_id == id)
                .sort((a, b) => a.created_at_timestamp - b.created_at_timestamp)
        }
    },

    mutations,
    actions
}