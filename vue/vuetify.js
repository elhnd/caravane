// src/plugins/vuetify.js
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css' 
import Vue from 'vue'
import Vuetify from 'vuetify'
Vue.use(Vuetify)

const opts = {
    icons: {
        iconfont: 'mdi', // default - only for display purposes
      },
}

export default new Vuetify({opts})