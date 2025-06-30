import { createApp } from 'vue'
import './index.css';
import store from './store'
import router from './router'
import App from './App.vue'
import "./plugins/chart.js"
import currencyUSD from "./filters/currency.js"

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
})

const app = createApp(App);

app
    .use(store)
    .use(router)
    .use(vuetify)
    .mount('#app');

app.config.globalProperties.$filters = {
    currencyUSD
}
