window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import 'popper.js'

import 'jquery';
import 'jquery/dist/jquery.slim.js';
import Vue from "vue";
import router from "./router";
import Axios from 'axios';
import App from './App';
import vuetify from './vuetify';
import store from './store';


Vue.config.productionTip = false;

Axios.defaults.baseURL = 'https://127.0.0.1:8000';

new Vue({
    vuetify,
    store,
    router,
    render: h => h(App)
}).$mount('#app');
