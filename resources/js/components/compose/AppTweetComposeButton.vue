<template>
    <button
        type="submit" 
        class="px-4 py-2 font-semibold leading-normal text-center rounded-full bg-blue-500 text-white transition-colors ease-in duration-75 hover:bg-blue-600 focus:outline-none"
    >
        {{ text }}
    </button>
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