import Vue from 'vue'

import vuetify from './vuetify' // path to vuetify export

import store from './store/'

// import './system/mixins.js'
// import './system/interceptors.js'
// import './system/element.js'

// import * as VueGoogleMaps from 'vue2-google-maps'

/**
 * Prepare vue router
 */
import VueRouter from 'vue-router'
import routes from './routes'

import Index from './pages/Index.vue'
import loginForm from './components/login'

Vue.use(VueRouter)

const router = new VueRouter({
    routes
})

// Vue.use(VueGoogleMaps, {
//     load: {
//         key: 'AIzaSyB9fKY42K7G4_FaSsF1qyy-FpvvSw77EUw',
//         libraries: 'places'
//     }
// })

if (document.getElementById('app')) {
    const app = new Vue({
        el: '#app',
        vuetify,
        router,
        store,
        components: { Index }
    })
}

if (document.getElementById('loginform')) {
    new Vue({
        el: '#loginform',
        vuetify,
        components: {
            loginForm
        }
    })
}
