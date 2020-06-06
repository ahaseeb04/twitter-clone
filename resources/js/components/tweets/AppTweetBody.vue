<template>
    <p class="whitespace-pre-wrap break-words">
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
                    'template': `<span>${this.replaceEntities(this.tweet.body)}</span>`
                }
            },

            entities () {
                return this.tweet.entities.data.slice().sort((a, b) => b.start - a.start)
            }
        },

        methods: {
            replaceEntities (body) {
                this.entities.forEach((entity) => {
                    body = body.substring(0, entity.start) 
                        + this.entityComponent(entity) 
                        + body.substring(entity.end)
                })

                return body ?? ''
            },

            entityComponent (entity) {
                return `<app-tweet-entity-${entity.type} body="${entity.body}" plain="${entity.body_plain}" />`
            }
        }
    }
</script>