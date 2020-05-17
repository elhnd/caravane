import Vue from "vue";
import VueRouter from "vue-router";
import Login from '../pages/Login';
import MainSlot from '../components/layout/MainSlot'
import Test from '../pages/Test';
import Client from '../pages/client/Client';

import store from '../store'
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [{
        path: "/login",
        name: "Login",
        component: Login,
        meta: {
            requiresAuth: false,
        }
    },
    {
        path: '/',
        component: MainSlot,
        children: [
            {
                path: "/home",
                name: "Home",
                meta: {
                    requiresAuth: false
                },
                component: Test
            },
            {
                path: "/test",
                name: "test",
                meta: {
                    requiresAuth: true
                },
                component: Test
            },
            {
                path: "/client",
                name: "client",
                meta: {
                    requiresAuth: true
                },
                component: Client
            },

        ],
        redirect: { name: 'Home' },
        meta: {
            requiresAuth: true,
            bodyClass: 'hold-transition skin-blue sidebar-mini'
        }
    },
    ]
});

router.beforeEach((to, from, next) => {
    const token = store.getters['auth/jwtDecoded'] || null
    const authorized = token && token.exp > Date.now() / 1000

    if (authorized) {
        if (to.matched.some(record => !record.meta.requiresAuth)) {
            next({ name: 'Home' })
        }
    } else if (to.matched.some(record => record.meta.requiresAuth)) {
        next({ name: 'Login' })
    }

    next()
});


export default router