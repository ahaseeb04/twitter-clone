<template>
    <a :href="`/${body_plain}`" class="text-blue-500">{{ body }}</a>
</template>

<script>
    export default {
        props: {
            body: {
                required: true,
                type: String
            },

            body_plain: {
                required: true,
                type: String
            }
        }
    }
</script>