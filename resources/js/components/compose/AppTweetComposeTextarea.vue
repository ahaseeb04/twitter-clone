<template>
    <textarea 
        class="w-full text-lg outline-none resize-none bg-gray-900" 
        :placeholder="placeholder"
        @input="$emit('input', $event.target.value); resize($event)"
        :value="value"
    ></textarea>
</template>

<script>
    export default {
        props: {
            value: {
                required: false
            },

            placeholder: {
                required: false,
                type: String
            }
        },

        methods: {
            resize (e) {
                e.target.style.height = 'auto'
                e.target.style.height = `${e.target.scrollHeight}px`
            }
        }
    }
</script>