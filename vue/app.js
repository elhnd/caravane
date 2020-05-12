window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import './css/app.css';
import 'popper.js'
import 'admin-lte';
import 'admin-lte/dist/js/adminlte.min.js';
import 'admin-lte/plugins/fontawesome-free/css/all.min.css';
import 'admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css';
import 'admin-lte/dist/css/adminlte.min.css';
import 'jquery';
import 'jquery/dist/jquery.slim.js';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import Vue from "vue";
import router from "./router";
import Axios from 'axios';
import Login from './pages/Login';
import Navbar from './components/menu/Navbar';
import Sidebar from './components/menu/Sidebar';
import App from './App';

Vue.config.productionTip = false;
Vue.component('myhome', App);
Vue.component('login', Login);
Vue.component('sidebar',Sidebar);
Vue.component('navbar',Navbar);

Axios.defaults.baseURL = 'http://127.0.0.1:8000';

let rt = new Vue({
    el: '#app',
    router
});
