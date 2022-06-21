<script>
import { useToast } from "vue-toastification";

export default {
    data() {
        return {
            title: '',
            type: ''
        }
    },

    methods: {
        addField() {
            const toast = useToast();
            const field = { title: this.title, type: this.type }

            this.axios
                .post('fields', field)
                .then(response => (toast("Field Added!")))
                .catch((error) => {
                    toast.error(error.response.data.message);
                })


        }
    }
}

</script>

<template>
    <div class='flex items-center justify-center  from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br'>
        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
            <div class='max-w-md mx-auto space-y-6'>

                <form action="">
                    <h2 class="text-2xl font-bold ">Create Field</h2>
                    <hr class="my-6">
                    <label class="uppercase text-sm font-bold opacity-70">Title</label>
                    <input v-model="title" type="text"
                        class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                    <label class="uppercase text-sm font-bold opacity-70">Type</label>
                    <select v-model="type"
                        class="w-full p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                        <option value="1">Date</option>
                        <option value="2">Number</option>
                        <option value="3">String</option>
                        <option value="4">Boolean</option>
                    </select>
                    <button
                        class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                        type="button" @click="addField">
                        Add Field
                    </button>
                </form>

            </div>
        </div>
    </div>
</template>

<style scoped>
a {
    color: #42b983;
}
</style>
