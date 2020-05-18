import Vue from 'vue'
import Vuex from 'vuex'
import auth from './modules/auth'
import general from './modules/general'
import user from './modules/user'
Vue.use(Vuex)

export default new Vuex.Store({
    strict: false,
    modules: {
        general,
        auth,
        user
    }
})