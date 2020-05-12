<template>
    <div>
        <p>{{ notification.id }}</p>
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