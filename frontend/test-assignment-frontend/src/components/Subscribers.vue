<script>
import { useToast } from "vue-toastification";


export default {
    data() {
        return {
            states: {
                1: 'active',
                2: 'unsubscribed',
                3: 'junk',
                4: 'bounced',
                5: 'unsubscribed'
            },
            subscribers: [],
            polling: null

        }
    },

    created() {
        this.loadSubcribers()
    },

    beforeDestroy() {
        clearInterval(this.polling)
    },

    methods: {
        loadSubcribers() {
            this.polling = setInterval(() => {
                this.axios
                    .get('subscribers')
                    .then(response => (
                        this.subscribers = response.data.subscribers


                    ))
            }, 6000)

        },
        deleteSubscriber(id) {
            const toast = useToast();

            this.axios
                .delete('subscribers/' + id)
                .then(response => (
                    toast("Deleted!"),
                    this.loadSubcribers()
                ))
                .catch((error) => {
                    toast.error(error.response.data.message);
                })


        }
    }
}

</script>

<template>
    <div class="sm:px-6 w-full">
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">

            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <tbody>

                        <tr v-if="subscribers.length > 0"
                            v-for="({ id, name, email, state, fieldValues }, index) in subscribers" tabindex="0"
                            class="focus:outline-none h-16 border border-gray-100 rounded">
                            <td class="">
                                <div class="flex items-center pl-5">
                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ name }}</p>

                                </div>
                            </td>
                            <td class="pl-24">
                                <div class="flex items-center">

                                    <p class="text-sm leading-none text-gray-600 ml-2">{{ email }}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">

                                    <p class="text-sm leading-none text-gray-600 ml-2">{{ states[state] }}</p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <p v-if="fieldValues.length > 0" v-for="({ title, value }, index) in fieldValues"
                                        tabindex="0"
                                        class="text-sm leading-none text-gray-600 ml-2 border border-sky-500"> {{ title
                                        }}
                                        - {{ value }}</p>
                                </div>
                            </td>


                            <td class="pl-4">
                                <button @click="deleteSubscriber(id)"
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-red-100 rounded hover:bg-gray-200 focus:outline-none">Delete</button>
                            </td>

                        </tr>
                        <tr class="h-3"></tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style scoped>
a {
    color: #42b983;
}
</style>
