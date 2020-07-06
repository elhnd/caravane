import * as types from './mutation_types'
import * as crud from '../../../utils/crud'
import { namespace } from './mutation_types'

const actions = {
    getOperations: ({ dispatch, commit }, query) =>
        crud.getItems({ dispatch, commit }, namespace, query),

    createOperation: ({ dispatch, commit, state }) =>
        crud.create({ dispatch, commit, state }, namespace)
}

function initialeState() {
    return {
        item: {
            id: null,
            libelle: '',
            montant: '',
            commentaire: '',
            dateOperation: ''
        },
    }
}

const state = {
    item: {
        id: null,
        libelle: '',
        montant: '',
        commentaire: '',
        dateOperation: ''
    },
    items: [],
    error: null,
    errors: {}
}

const getters = {
    operations: state => state.item,
    operation: state => state.items,
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
    // [types.UPDATE_ONE_ITEM](state) {
    //     state.depot = Object.assign(state, null)
    // }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}