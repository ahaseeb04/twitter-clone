<template>
    <a :href="`/hashtags/${plain}`" class="text-blue-500">{{ body }}</a>
</template>

<script>
    export default {
        props: {
            body: {
                required: true,
                type: String
            },

            plain: {
                required: true,
                type: String
            }
        }
    }
</script>