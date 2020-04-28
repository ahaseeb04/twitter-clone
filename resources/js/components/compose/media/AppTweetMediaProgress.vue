<template>
    <div class="mb-5 h-1 w-full rounded-full overflow-hidden bg-gray-800">
        <div class="h-1 bg-blue-500" :style="`width: ${progress}%`"></div>
    </div>
</template>

<script>
    export default {
        props: {
            progress: {
                required: true,
                type: Number
            }
        }
    }
</script>