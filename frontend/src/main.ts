import { createApp } from 'vue'
import App from './App.vue'
import './style.css'

import router from './router'

import BootstrapVue3 from 'bootstrap-vue-3'
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css'
import 'bootstrap/dist/css/bootstrap.css'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUser, faSearch, faPlus, faUndo, faSave } from '@fortawesome/free-solid-svg-icons'

library.add(faUser, faSearch, faPlus, faUndo, faSave)

const app = createApp(App)

app.use(BootstrapVue3)
app.use(router)
app.component('font-awesome-icon', FontAwesomeIcon)

app.mount('#app')
