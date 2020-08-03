<template>
    <div class="flex items-center space-x-1">
        <span 
            class="font-bold text-white"
            :class="{
                'truncate max-w-24 sm:max-w-40': truncateName,
            }"
        >
            {{ user.name }}
        </span>
        
        <span v-if="user.verified">
            <app-verified-icon />
        </span>

        <span 
            class="font-normal text-cool-gray-500"
            :class="{
                'truncate max-w-24 sm:max-w-40': truncateUsername,
                'hidden': hideUsername
            }"
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
        },

        computed: {
            truncateName () {
                return this.user.name.length > 10
            },

            truncateUsername () {
                return this.user.username.length > 10
            }
        }
    }
</script>