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
                    'template': `<div>${this.replaceEntities(this.tweet.body)}</div>`
                }
            },

            entities () {
                return this.tweet.entities.data.sort((a, b) => b.start - a.start)
            }
        },

        methods: {
            replaceEntities (body) {
                this.entities.forEach((entity) => {
                    body = body.substring(0, entity.start) + this.entityComponent(entity) + body.substring(entity.end)
                })

                return body
            },

            entityComponent (entity) {
                return `<app-tweet-entity-${entity.type} body="${entity.body}" body_plain="${entity.body_plain}" />`
            }
        }
    }
</script>