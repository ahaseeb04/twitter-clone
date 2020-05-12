<template>
    <div class="flex w-full">
        <component 
            :is="`AppNotification${notification.type}`"
            :notification="notification"
        />
    </div>
</template>

<script>
    export default {
        props: {
            notification: {
                required: true,
                type: Object
            }
        }
    }
</script>