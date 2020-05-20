require('lodash');
//import './scss/app.scss';
import Vue from "vue";
import router from "./router";
import App from './App';
import vuetify from './vuetify';
import store from './store';
import IsMainTemplate from '../vue/components/layout/IsMainTemplate'
import Axios from 'axios'
Vue.config.productionTip = false;
Vue.component('is-main-template', IsMainTemplate);

Axios.defaults.baseURL = 'https://127.0.0.1:8000';
Vue.config.productionTip = false
new Vue({
    vuetify,
    store,
    router,
    render: h => h(App)
}).$mount('#app');
