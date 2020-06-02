
import Vue from "vue";
import router from "./router";
import App from './App';
import vuetify from './vuetify';
import store from './store';
import IsMainTemplate from '../vue/components/layout/IsMainTemplate'
import Axios from 'axios';
import DateMixin from './mixin/DateMixin';
import Security from './mixin/Security';
import '@fortawesome/fontawesome-free/css/all.css' // Ensure you are using css-loader


Vue.mixin(DateMixin)
Vue.mixin(Security)
Vue.config.productionTip = false;
Vue.component('is-main-template', IsMainTemplate);
Axios.defaults.baseURL = 'https://127.0.0.1:8000';
//Axios.defaults.baseURL =  'https://www.caravanebyerc.com';
Vue.config.productionTip = false
new Vue({
    vuetify,
    store,
    router,
    icons: {
        iconfont: 'fa',
      },
    render: h => h(App)
}).$mount('#app');
