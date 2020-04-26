<template>
    <img :src="avatar" class="w-10 h-10 rounded-full object-cover">
</template>

<script>
    export default {
        props: {
            avatar: {
                required: true,
                type: String
            }
        }
    }
</script>