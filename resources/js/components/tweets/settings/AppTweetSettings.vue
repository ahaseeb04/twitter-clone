<template>
    <div>
        <app-dropdown>
            <template slot="trigger">
                <svg
                    class="h-5 text-cool-gray-500"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path 
                        fill-rule="evenodd" 
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" 
                        clip-rule="evenodd"
                    />
                </svg>
            </template>

            <app-dropdown-item @click="deleteTweet" v-if="ownTweet">
                <span class="text-red-500">Delete</span>
            </app-dropdown-item>

            <app-dropdown-item>
                Embed tweet
            </app-dropdown-item>
        </app-dropdown>
    </div>
</template>

<script>
    import axios from 'axios'
    
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        },

        computed: {
            ownTweet () {
                return this.tweet.user.username === User.username
            }
        },

        methods: {
            async deleteTweet () {
                if (confirm('Are you sure you want to delete this tweet?')) {
                    await axios.delete(`/api/tweets/${this.tweet.id}`)
                }
            }
        }
    }
</script>