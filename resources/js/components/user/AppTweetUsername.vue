<template>
    <div class="flex items-center space-x-1">
        <span class="max-w-40 truncate font-bold text-white">{{ user.name }}</span>
        <span v-if="user.verified">
            <app-verified-icon />
        </span>
        <span 
            class="max-w-36 md:max-w-40 truncate font-normal text-cool-gray-500"
            v-if="!hideUsername"
        >
            @{{ user.username }}
        </span>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                required: true,
                type: Object
            },

            hideUsername: {
                required: false,
                type: Boolean
            }
        }
    }
</script>