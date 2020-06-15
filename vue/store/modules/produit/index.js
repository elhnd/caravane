import * as types from './mutation_types'
import * as crud from '../../../utils/crud'
import { namespace } from './mutation_types'
import pluralize from 'pluralize'
import axios from '../../../interceptor'
import { API_HOST } from '../../../config/_entrypoint'

const actions = {
    getProduits: ({ dispatch, commit }, query) =>
        crud.getItems({ dispatch, commit }, namespace, query),

    createProduit: ({ commit, state, namespace = 'DEPOT' }) => {
        commit(`${namespace}_SET_ERROR`, null)

        return axios
            .post(`${API_HOST}/${pluralize(namespace.toLowerCase())}`, { ...state.item, categorie: `/api/categories/${state.item.categorie}`, fournisseur: `/api/fournisseurs/${state.item.fournisseur}` })
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
    updateProduit: ({ commit, state }, namespace = 'DEPOT') => {
        commit(`${namespace}_SET_ERROR`, null)

        return axios
            .put(
                `${API_HOST}/${pluralize(namespace.toLowerCase())}/${state.item.id}`, { ...state.item, categorie: `/api/categories/${state.item.categorie}`, fournisseur: `/api/fournisseurs/${state.item.fournisseur}` })
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
    removeDepot: ({ dispatch, commit }, id) => crud.remove({ dispatch, commit }, namespace, id)
}

function initialeState() {
    return {
        item: {
            id: null,
            designation: '',
            taille: '',
            age: '',
            pointure: '',
            couleur: '',
            prixVente: 0,
            fournisseur: '',
            categorie: '',
        },
    }
}

const state = {
    item: {
        id: null,
        designation: '',
        taille: '',
        age: '',
        pointure: '',
        couleur: '',
        prixVente: 0,
        fournisseur: '',
        categorie: '',
    },
    items: [],
    error: null,
    errors: {}
}

const getters = {
    produit: state => state.item,
    produits: state => state.items,
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
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}