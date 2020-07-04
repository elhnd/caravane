import * as types from './mutation_types'
import * as crud from '../../../utils/crud'
import { namespace } from './mutation_types'
import pluralize from 'pluralize'
import axios from '../../../interceptor'
import { API_HOST } from '../../../config/_entrypoint'

const actions = {
    getVentesFournisseur: ({ dispatch, commit }, query) =>
        crud.getItems({ dispatch, commit }, namespace, query),
    getVente: ({ dispatch, commit }, id) => crud.getItem({ dispatch, commit }, namespace, id)
}

function initialeState() {
    return {
        item: {
            fournisseurProduitsVendus: []
        },
    }
}

const state = {
    item: {
        fournisseurProduitsVendus: []
    },
    items: [],
    error: null,
    errors: {}
}

const getters = {
    fournisseur: state => state.item,
    fournisseurs: state => state.items,
    error: state => state.error,
    errors: state => state.errors,
    fournisseurProduitsVendus: state => {
        const allVente = []
        //console.log(state.items);
        state.items.map(ventes => {
            ventes.fournisseurProduitsVendus.forEach(vente => {
                allVente.push(vente)
            });
        })
        return allVente;
    },
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