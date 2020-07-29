<template>
    <div class="relative" v-click-outside="close">
        <div @click.prevent="open = !open">
            <slot name="trigger" />
        </div>
        <div 
            v-show="open"
            class="absolute z-50 w-56 rounded-lg overflow-hidden shadow-light bg-gray-900" 
            :class="position"
        >
            <slot />
        </div>
    </div>
</template>

<script>
    import ClickOutside from 'vue-click-outside'

    export default {
        data () {
            return {
                open: false
            }
        },

        props: {
            position: {
                required: false,
                type: String,
                default: 'top-0 right-0'
            }
        },

        methods: {
            close () {
                this.open = false
            }
        },

        directives: {
            ClickOutside
        }
    }
</script>