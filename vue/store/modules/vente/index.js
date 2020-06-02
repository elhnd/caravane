import * as types from './mutation_types'
import * as crud from '../../../utils/crud'
import { namespace } from './mutation_types'
import pluralize from 'pluralize'
import axios from '../../../interceptor'
import { API_HOST } from '../../../config/_entrypoint'

const actions = {
    getVentes: ({ dispatch, commit }, query) =>
        crud.getItems({ dispatch, commit }, namespace, query),

    createVente: ({ commit, state, namespace = 'VENTE' }) => {
        commit(`${namespace}_SET_ERROR`, null)

        return axios
            .post(`${API_HOST}/${pluralize(namespace.toLowerCase())}`, { ...state.item, produit: `/api/produits/${state.item.produit.id}`, client: `/api/clients/${state.item.client.id}` })
            .then(response => response.data)
            .catch(e => {
                const { data } = e.response

                if (data.violations) {
                    const errors = {}

                    data.violations.map(violation => {
                        Object.assign(errors, { [violation.propertyPath]: violation.message })
                    })

                    commit(`${namespace}_SET_ERRORS`, errors)
                }

                const error = data['hydra:description']
                    ? data['hydra:description']
                    : data.message
                commit(`${namespace}_SET_ERROR`, error)

                throw data
            })
    },
    updateVente: ({ commit, state }, namespace = 'VENTE') => {
        commit(`${namespace}_SET_ERROR`, null)

        return axios
            .put(
                `${API_HOST}/${pluralize(namespace.toLowerCase())}/${state.item.id}`, { ...state.item, produit: `/api/produits/${state.item.produit.id}`, client: `/api/clients/${state.item.client.id}` })
            .then(response => response.data)
            .catch(e => {
                const { data } = e.response

                if (data.violations) {
                    const errors = {}

                    data.violations.map(violation => {
                        Object.assign(errors, { [violation.propertyPath]: violation.message })
                    })

                    commit(`${namespace}_SET_ERRORS`, errors)
                }

                const error = data['hydra:description']
                    ? data['hydra:description']
                    : data.message
                commit(`${namespace}_SET_ERROR`, error)

                throw data
            })
    }
    ,
    removeVente: ({ dispatch, commit }, id) => crud.remove({ dispatch, commit }, namespace, id)
}

function initialeState() {
    return {
        item: {
            id: null,
            produit: {
                id: null
            },
            quantiteVendue: 0,
            prixVenteTotal: 0,
            prixNetPayer: 0,
            dateVente: "",
            client: {
                id: null
            }
        },
    }
}

const state = {
    item: {
        id: null,
        produit: {
            id: null
        },
        quantiteVendue: 0,
        prixVenteTotal: 0,
        prixNetPayer: 0,
        dateVente: "",
        client: {
            id: null
        }
    },
    items: [],
    error: null,
    errors: {}
}

const getters = {
    vente: state => state.item,
    ventes: state => state.items,
    error: state => state.error,
    errors: state => state.errors,

}
const mutations = {

    [types.SET_ITEM](state, item) {
        Object.assign(state, { item })
    },
    [types.RESET_ITEM](state) {
        Object.assign(state, initialeState())
    },
    [types.UPDATE_ITEM](state, item) {
        state.item = Object.assign({}, state.item, item)
    },
    [types.SET_ITEMS](state, items) {
        Object.assign(state, { items })
    },
    [types.SET_ERROR](state, error) {
        Object.assign(state, { error })
    },
    [types.SET_ERRORS](state, errors) {
        Object.assign(state, { errors })
    },
    [types.RESET](state) {
        Object.assign(state, defaultState())
    },
    [types.UPDATE_ONE_ITEM](state) {
        state.depot = Object.assign(state, null)
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}