<script>
import { useToast } from "vue-toastification";


export default {
  data() {
    return {
      name: '',
      email: '',
      fields: [],
      fieldValues: {},
      types: { 1: 'date', 2: 'number', 3: 'text', 4: 'checkbox' },
      polling: null
    }
  },

  created() {
    this.loadFields()
  },
  beforeDestroy() {
    clearInterval(this.polling)
  },

  methods: {
    loadFields() {
      this.polling = setInterval(() => {
        this.axios
          .get('fields')
          .then(response => (
            this.fields = response.data.fields


          ))
      }, 5000)

    },
    subscribe() {
      const toast = useToast();
      const subscriber = { name: this.name, email: this.email, fieldValues: this.fieldValues }

      this.axios
        .post('subscribers', subscriber)
        .then(response => (toast("Subscribed!")))
        .catch((error) => {
          toast.error(error.response.data.message);
        })


    }
  }
}

</script>

<template>


  <body class="font-mono bg-gray-400">

    <!-- Container -->
    <div class="container mx-auto">
      <div class="flex justify-center px-6 my-12">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
          <!-- Col -->
          <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
            style="background-image: url('https://scontent.fist4-1.fna.fbcdn.net/v/t1.6435-9/38071666_305546899992011_5788436091786756096_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=qe63SxlZSccAX_MBn2U&_nc_ht=scontent.fist4-1.fna&oh=00_AT_HMbEnggY9AQwlwUV60URYmmqfKlsQJdhybd9uwcRxUw&oe=62D8A277')">
          </div>
          <!-- Col -->
          <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
            <h3 class="pt-4 text-2xl text-center">Subscribe to newsletter!</h3>
            <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded">

              <div class="mb-4">
                <div class="mb-4 md:mr-2 md:mb-0">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                    Name
                  </label>
                  <input
                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="name" type="text" v-model="name" placeholder=" Name" />
                </div>
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                  Email
                </label>
                <input
                  class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                  id="email" type="email" placeholder="Email" v-model="email" />

                <div v-if="fields.length > 0" v-for="({ id, title, type }, index) in fields">


                  <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                    {{ title }}
                  </label>
                  <input class="w-full px-3 py-2 mb-3 text-sm" :key="id" :id="title" :type="types[type]"
                    :placeholder="title" v-model="fieldValues[title]" />

                </div>
              </div>





              <div class="mb-6 text-center">
                <button
                  class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                  type="button" @click="subscribe">
                  Subscribe
                </button>
              </div>
              <hr class="mb-6 border-t" />


            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</template>

<style scoped>
a {
  color: #42b983;
}
</style>
