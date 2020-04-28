<template>
    <a 
        href="#" 
        class="block p-4 leading-none hover:bg-gray-800"
        @click.prevent="handleClick"
    >
        <slot />
    </a>
</template>

<script>
    export default {
        methods: {
            handleClick (e) {
                this.$emit('click', e)
                this.$parent.close()
            }
        }
    }
</script>