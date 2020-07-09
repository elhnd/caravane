
import Vue from "vue";
import router from "./router";
import App from './App';
import vuetify from './vuetify';
import store from './store';
import IsMainTemplate from '../vue/components/layout/IsMainTemplate'
import Axios from 'axios';
import axios from './interceptor';
import DateMixin from './mixin/DateMixin';
import Security from './mixin/Security';
import '@fortawesome/fontawesome-free/css/all.css' // Ensure you are using css-loader
import VueExcelXlsx from "vue-excel-xlsx";

Vue.use(VueExcelXlsx)
import '@fortawesome/fontawesome-free/css/all.css'; // Ensure you are using css-loader
import VueRouter from 'vue-router';

Vue.use(VueRouter)
Vue.mixin(DateMixin)
Vue.mixin(Security)
Vue.config.productionTip = false;
Vue.component('is-main-template', IsMainTemplate);
Axios.defaults.baseURL = 'http://test.jolofpay.com';
//Axios.defaults.baseURL =  'https://www.caravanebyerc.com';
Vue.config.productionTip = false

// var interval = 3000;  // 1000 = 1 second, 3000 = 3 seconds

// function doAjax() {
//   axios
//     .get('/api/produits')
//     .then(response => {console.log(response.data)})
//     .then(setTimeout(doAjax, interval))
//     .catch(e => {

//     })
// }

// setTimeout(doAjax, interval);
new Vue({
  vuetify,
  store,
  router,
  icons: {
    iconfont: 'fa',
  },
  render: h => h(App)
}).$mount('#app');
