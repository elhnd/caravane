// src/plugins/vuetify.js
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify)

const opts = {
  icons: {
    iconfont: 'mdi', // default - only for display purposes
  },
  theme: {
    options: {
      customProperties: true,
    },
  },
  treeShake: true,
}

export default new Vuetify({ opts })