<template>
    <div class="flex space-x-1">
        <span class="max-w-40 truncate font-bold text-white">{{ user.name }}</span>
        <span class="max-w-36 md:max-w-40 truncate font-normal text-cool-gray-500">@{{ user.username }}</span>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                required: true,
                type: Object
            }
        }
    }
</script>