<template>
    <div class="space-y-6">
        <template v-if="tweet">
            <app-tweet-variant-tweet
                :tweet="tweet"
                verticalBorderBetweenAvatars
            />

            <app-tweet-reply-compose 
                :tweet="tweet"
                @success="$emit('close')"
            />
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            tweet: {
                required: true,
                type: Object
            }
        }
    }
</script>