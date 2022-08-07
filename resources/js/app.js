require('./bootstrap');
import { createApp } from 'vue'
import App from './components/App'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/dist/sweetalert2.min.css'
import axios from 'axios'
import VueAxios from 'vue-axios'
import router from './router'
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(fas);

window.Swal = Swal
const toast = Swal.mixin({
    toast:true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500
})

window.toast = toast;

const app = createApp(App)
app.use(router)
.component('fas', FontAwesomeIcon);
// app.component('font-awesome-icon', FontAwesomeIcon)
app.use(VueAxios, axios)
app.mount('#app')
// createApp(App).use(router).use(axios).mount('#app')