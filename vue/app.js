/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
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
    router,
});
// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
/* <script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script> */

/* <style lang="stylus">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</style> */
