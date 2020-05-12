<template>
    <div class="flex w-full cursor-pointer transition-colors ease-in duration-75 hover:bg-gray-800">
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