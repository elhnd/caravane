import axios from 'axios'
import store from './store'
import * as types from './store/modules/general/mutation_types'

axios.defaults.timeout = 30000

axios.interceptors.request.use(
    config => {
        store.commit(`general/${types.LOADING_START}`)

        const token = store.getters['auth/jwtDecoded'] || null
        const authrized = token && token.exp > Date.now() / 1000

        if (authrized) {
            config.headers.common.Authorization = `Bearer ${store.state.auth.token}`
        }

        return config
    },
    error => {
        store.commit(`general/${types.LOADING_STOP}`)

        return Promise.reject(error)
    }
)

axios.interceptors.response.use(
    data => {
        store.commit(`general/${types.LOADING_STOP}`)

        return data
    },
    error => {
        store.commit(`general/${types.LOADING_STOP}`)

        if (
            error.response.data &&
            error.response.data.code &&
            error.response.data.code === 401 &&
            error.response.data.message == 'Invalid credentials.'
        ) {
           window.location.href = '/'
        }

        return Promise.reject(error)
    }
)

export default axios
