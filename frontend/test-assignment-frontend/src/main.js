import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import Toast from "vue-toastification";
import axios from 'axios';
import "vue-toastification/dist/index.css";

//create an axios instance in order to use it globally with same config
const instance = axios.create({
    baseURL: 'http://localhost/api/',
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    },

})



const app = createApp(App)
app.config.globalProperties.axios = instance;
const options = {
    timeout: 2000
};

app.use(Toast, options);
app.mount('#app')
