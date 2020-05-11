import Vue from "vue";
import VueRouter from "vue-router";

import Login from '../pages/Login';
import App from '../App';
import Test from '../pages/Test';
Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [{
        path: "/",
        name:"login",
        component: Login
    },
    {
        path: "/home",
        name:"app",
        component: App
    },
    {
        path: "/test",
        name:"test",
        component: Test
    }]
});