<template>
    <img 
        :src="avatar" 
        class="rounded-full object-cover"
        :class="{
            'w-10 h-10': !sm,
            'w-8 h-8': sm
        }"
    >
</template>

<script>
    export default {
        props: {
            avatar: {
                required: true,
                type: String
            },

            sm: {
                required: false,
                type: Boolean
            }
        }
    }
</script>