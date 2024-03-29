import Vue from "vue";
import VueRouter from "vue-router";
import Login from '../pages/Login';
import MainSlot from '../components/layout/MainSlot'
import Test from '../pages/Test';
import Client from '../pages/client/Client';
import Fournisseur from '../pages/fournisseur/Fournisseur';
//import Depot from '../pages/stock/Depot';
import Categorie from '../pages/categorie/Categorie';
import Produit from '../pages/produit/Produit';
import Depot from '../pages/depot/Depot';
import DetailVente from '../pages/vente/DetailVente';
import AddVente from '../pages/vente/AddVente';
import ProduitFournisseur from '../pages/produit/ProduitFournisseur';
import ProduitsVente from '../pages/vente/ProduitsVente';
import AllVente from '../pages/vente/AllVente';
import store from '../store';
import UserList from '../pages/user/List';
import Caisse from '../pages/caisse/Caisse';
import OperationCaisse from '../pages/caisse/OperationCaisse';
import EnAttente from '../pages/depot/EnAttente';
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
                    requiresAuth: true
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
                path: "/fournisseur/add/produit/:token_access",
                name: "ProduitFournisseur",
                meta: {
                    requiresAuth: true
                },
                component: ProduitFournisseur
            },
            {
                path: "/user/list",
                name: "UserList",
                meta: {
                    requiresAuth: true
                },
                component: UserList
            },
            {
                path: "/client",
                name: "client",
                meta: {
                    requiresAuth: true
                },
                component: Client
            },
            {
                path: "/fournisseur",
                name: "fournisseur",
                meta: {
                    requiresAuth: true
                },
                component: Fournisseur
            },
            {
                path: "/depot",
                name: "depot",
                meta: {
                    requiresAuth: true
                },
                component: Depot
            },
            {
                path: "/categorie",
                name: "categorie",
                meta: {
                    requiresAuth: true
                },
                component: Categorie
            },
            {
                path: "/produit",
                name: "produit",
                meta: {
                    requiresAuth: true
                },
                component: Produit
            },
            {
                path: "/vente",
                name: "vente",
                meta: {
                    requiresAuth: true
                },
                component: DetailVente
            },
            {
                path: "/vente/add",
                name: "addVente",
                meta: {
                    requiresAuth: true
                },
                component: AddVente
            },
            {
                path: "/vente/produit/detail",
                name: "produitsVente",
                meta: {
                    requiresAuth: true
                },
                component: ProduitsVente
            },
            {
                path: "/vente/allvente",
                name: "allVente",
                meta: {
                    requiresAuth: true
                },
                component: AllVente
            },
            {
                path: "/caisse",
                name: "caisse",
                meta: {
                    requiresAuth: true
                },
                component: Caisse
            },
            {
                path: "/operation/caisse",
                name: "operation_caisse",
                meta: {
                    requiresAuth: true
                },
                component: OperationCaisse
            },
            {
                path: "/en-attente",
                name: "en_attente",
                meta: {
                    requiresAuth: true
                },
                component: EnAttente
            }

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