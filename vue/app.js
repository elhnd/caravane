window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import 'popper.js'

import 'jquery';
import 'jquery/dist/jquery.slim.js';
import Vue from "vue";
import router from "./router";
import Axios from 'axios';
import Login from './pages/Login';
import App from './App';
import vuetify from './vuetify';


Vue.config.productionTip = false;
Vue.component('myhome', App);
Vue.component('login', Login);

Axios.defaults.baseURL = 'http://127.0.0.1:8000';

let rt = new Vue({
    el: '#app',
    vuetify,
    router
});
