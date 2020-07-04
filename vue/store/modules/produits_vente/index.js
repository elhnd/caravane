import * as types from './mutation_types'
import * as crud from '../../../utils/crud'
import { namespace } from './mutation_types'
import pluralize from 'pluralize'
import axios from '../../../interceptor'
import { API_HOST } from '../../../config/_entrypoint'

const actions = {
    getVentesProduits: ({ dispatch, commit }, query) =>
        crud.getItems({ dispatch, commit }, namespace, query),

    // createVente: ({ commit, state, namespace = 'VENTE' }) => {
    //     commit(`${namespace}_SET_ERROR`, null)

    //     return axios
    //         .post(`${API_HOST}/${pluralize(namespace.toLowerCase())}`, {
    //             ...state.item,
    //             //produit: [`${state.item.produit}`],
    //             client: `/api/clients/${state.item.client.id}`
    //         })
    //         .then(response => response.data)
    //         .catch(e => {
    //             const { data } = e.response

    //             if (data.violations) {
    //                 const errors = {}

    //                 data.violations.map(violation => {
    //                     Object.assign(errors, { [violation.propertyPath]: violation.message })
    //                 })

    //                 commit(`${namespace}_SET_ERRORS`, errors)
    //             }

    //             const error = data['hydra:description']
    //                 ? data['hydra:description']
    //                 : data.message
    //             commit(`${namespace}_SET_ERROR`, error)

    //             throw data
    //         })
    // },
    updateVenteProduits: ({ commit, state }, namespace = 'VENTE_PRODUITS') => {
        commit(`${namespace}_SET_ERROR`, null)

        return axios
            .put(
                `${API_HOST}/${pluralize(namespace.toLowerCase())}/${state.item.id}`, { ...state.item, produit: `/api/produits/${state.item.produit.id}` })
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
    // ,
    // removeVente: ({ dispatch, commit }, id) => crud.remove({ dispatch, commit }, namespace, id),
    // getProduits: ({ commit }) => {
    //     axios.get("/api/depots").then(response => {
    //         // const produits = [];
    //         // console.log(response.data["hydra:member"])
    //         // response.data["hydra:member"].forEach(produit => {
    //         //     produits.push(produit.produit);
    //         // });
    //         commit('VENTE_SET_PROD_ITEM', response.data["hydra:member"]);
    //     });
    // },
}

function initialeState() {
    return {
        item: {
            id: null,
            vente: {
                id: null,
            },
            produit: {
                id: null,
                categorie: {}
            },
            quantiteVendue: 0,
            prixVenteTotal: "",
            prixNetPayer: "",
            commentaire: "",
            status: ""
        }
    }
}

const state = {
    item: {
        id: null,
        vente: {
            id: null
        },
        produit: {
            id: null,
            categorie: {}
        },
        quantiteVendue: 0,
        prixVenteTotal: "",
        prixNetPayer: "",
        commentaire: "",
        status: ""
    },
    items: {},
    venteProduits: {
        client: {},
        venteProduits: []
    },
    error: null,
    errors: {},
    produits: [],
    counter: 10
}

const getters = {
    produitsVente: state => state.item,
    produitsVentes: state => state.venteProduits,
    error: state => state.error,
    errors: state => state.errors,

}
const mutations = {
    [types.SET_VENTE](state, venteProduits) {
        Object.assign(state, { venteProduits })
    },
    [types.UPDATE_ITEM](state, item) {
        state.item = Object.assign({}, state.item, item)
    },
    // [types.UPDATE_ITEM_PRODUIT](state, item) {
    //     state.item = Object.assign({}, state.item.produit, item)
    // },
    [types.SET_ITEM](state, item) {
        Object.assign(state, { item })
    },
    [types.RESET_ITEM](state) {
        Object.assign(state, initialeState())
    },
    [types.SET_ERROR](state, error) {
        Object.assign(state, { error })
    },
    [types.SET_ERRORS](state, errors) {
        Object.assign(state, { errors })
    },
    setProduit(state, item) {
        state.item.produit = item;
        state.item.quantiteVendue = 0;
        state.item.prixVenteTotal = 0;
    },
    calculQttPrx(state, qtt) {
        state.item.quantiteVendue = qtt;
        state.item.prixVenteTotal = (state.item.produit.prixVente * qtt).toString();
    },
    setStatus(state, status) {
        state.item.status = status;
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}