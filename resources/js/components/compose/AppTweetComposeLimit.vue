<template>
    <div class="w-10 h-10 relative transform -rotate-90">
        <svg viewBox="0 0 120 120">
            <circle 
                cx="60"
                cy="60"
                fill="none"
                :r="radius"
                stroke-width="8"
                class="stroke-current text-cool-gray-700"
            />

            <circle 
                cx="60"
                cy="60"
                fill="none"
                :r="radius"
                stroke-width="8"
                :stroke-dasharray="dash"
                :stroke-dashoffset="offset"
                class="stroke-current text-blue-500"
                :class="{
                    '!text-red-500': percentageIsOver
                }"
            />
        </svg>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                radius: 30,
                limit: 280
            }
        },

        props: {
            body: {
                required: true,
                type: String
            }
        },

        computed: {
            percentage () {
                return (this.body.trim().length * 100) / this.limit 
            },

            displayPercentage () {
                return this.percentage <= 100 ? this.percentage : 100
            },

            percentageIsOver () {
                return this.percentage > 100
            },

            dash () {
                return 2 * Math.PI * this.radius
            },

            offset () {
                let circ = this.dash
                let progress = this.displayPercentage / 100

                return circ * (1 - progress)
            }
        }
    }
</script>