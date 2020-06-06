<template>
    <p class="whitespace-pre-wrap break-words text-cool-gray-400">
        <component :is="body" />
    </p>
</template>

<script>
    export default {
        props: {
            notification: {
                required: true,
                type: Object
            }
        },

        computed: {
            body () {
                return {
                    'template': `<span>${this.replaceEntities(this.notification.data.tweet.body)}</span>`
                }
            },

            entities () {
                return this.notification.data.tweet.entities.data.slice().sort((a, b) => b.start - a.start)
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