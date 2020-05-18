<template>
    <p class="whitespace-pre-wrap">
        <component :is="body" />
    </p>
</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        },

        computed: {
            body () {
                return {
                    'template': `<div>${this.tweet.body}</div>`
                }
            }
        }
    }
</script>