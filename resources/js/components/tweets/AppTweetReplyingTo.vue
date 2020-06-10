<template>
    <div class="mb-2 text-sm text-cool-gray-400">
        Replying to <a href="#" class="text-blue-500">@{{ tweet.replying_to }}</a>
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