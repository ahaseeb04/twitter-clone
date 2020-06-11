<template>
    <div class="w-full inline-block p-4 border-b border-gray-800">
        <span class="text-white font-semibold">{{ text }}</span>
    </div>
</template>

<script>
    export default {
        props: {
            text: {
                required: true,
                type: String
            }
        }
    }
</script>