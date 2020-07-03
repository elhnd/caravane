import Vue from 'vue'
import Vuex from 'vuex'
import auth from './modules/auth'
import general from './modules/general'
import user from './modules/user'
import depot from './modules/depot'
import vente from './modules/vente'
import fournisseur from './modules/fournisseur'
import client from './modules/client'
import produit from './modules/produit'
import produits_vente from './modules/produits_vente'
Vue.use(Vuex)

export default new Vuex.Store({
    strict: false,
    modules: {
        general,
        auth,
        user,
        depot,
        vente,
        fournisseur,
        client,
        produit,
        produits_vente
    }
})