import jwtDecode from 'jwt-decode'
import * as types from './mutation_types'
import router from '../../../router'
import axios from '../../../interceptor'

const actions = {
    login({ commit }, data) {
        commit(types.AUTH_ERROR_CHANGE, null)

        const url = `${process.env.API_URL}/login`

        return axios.post(url, data)
            .catch(e => {
                commit(types.AUTH_ERROR_CHANGE, 'Username or password are incorrect')

                throw e
            })
    },

    logout({ commit }) {
        commit(types.AUTH_RESET)
        router.push({ name: 'Login' })
    }
}

function initialeState() {
    return {
        token: localStorage.getItem('token'),
        roles: [],
        error: null
    }
}

const state = initialeState()

const getters = {
    jwtDecoded: state => {
        const token = state.token || null

        if (token !== null) {
            return jwtDecode(state.token)
        }
    },
    roles: state => {
        token = jwtDecode(state.token)
        return state.roles = token.roles
    },
    error: state => state.error,
}

const mutations = {
    [types.AUTH_UPDATE_TOKEN](state, data) {
        localStorage.setItem('token', data.token)
        const tokenDecode = jwtDecode(data.token)
        localStorage.setItem('roles', tokenDecode.roles)
        state.token = data.token
        state.roles = tokenDecode.roles
    },
    [types.AUTH_ERROR_CHANGE](state, error) {
        state.error = error
    },
    [types.AUTH_RESET](state) {
        localStorage.removeItem('token')
        //localStorage.removeItem('name')
        localStorage.removeItem('error')
        localStorage.removeItem('roles')

        const s = initialeState()
        Object.keys(s).forEach(key => {
            state[key] = s[key]
        })
        window.location.href = '/login'
    }

}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}