<template>
    <form 
        class="flex space-x-3"
        @submit.prevent="submit" 
    >
        <app-user-avatar 
            :avatar="$user.avatar"
        />

        <div class="flex-grow space-y-2">
            <app-tweet-compose-textarea 
                v-model="form.body"
            />
        
            <div class="flex justify-between">
                <div>
                    <!--  -->
                </div>

                <div class="flex items-center justify-end space-x-2">
                    <div>
                        <app-tweet-compose-limit 
                            :body="form.body"
                        />
                    </div>

                    <button
                        type="submit" 
                        class="px-4 py-3 font-semibold leading-none text-center rounded-full bg-blue-500 text-white"
                        :class="{
                            'opacity-50 pointer-events-none select-none': form.body.length > 280
                        }"
                    >
                        Tweet
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import axios from 'axios'

    export default {
        data () {
            return {
                form: {
                    body: ''
                }
            }
        },

        methods: {
            async submit () {
                await axios.post('/api/tweets', this.form)

                this.form.body = ''
            }
        }
    }
</script>