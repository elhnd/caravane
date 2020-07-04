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
            .post(`${API_HOST}/${pluralize(namespace.toLowerCase())}`, {
                ...state.item,
                //produit: [`${state.item.produit}`],
                client: `/api/clients/${state.item.client.id}`
            })
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
                `${API_HOST}/${pluralize(namespace.toLowerCase())}/${state.item.id}`, { ...state.item, produit: [`/api/produits/${state.item.produit}`], client: `/api/clients/${state.item.client.id}` })
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
    removeVente: ({ dispatch, commit }, id) => crud.remove({ dispatch, commit }, namespace, id),
    getProduits: ({ commit }) => {
        axios.get("/api/depots").then(response => {
            // const produits = [];
            // console.log(response.data["hydra:member"])
            // response.data["hydra:member"].forEach(produit => {
            //     produits.push(produit.produit);
            // });
            commit('VENTE_SET_PROD_ITEM', response.data["hydra:member"]);
        });
    }
}

function initialeState() {
    return {
        item: {
            id: null,
            produit: [],
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
        produit: [],
        quantiteVendue: 0,
        prixVenteTotal: 0,
        prixNetPayer: 0,
        dateVente: "",
        client: {
            id: null
        }
    },
    items: [],
    ventesFours: [],
    error: null,
    errors: {},
    produits: [],
    totalJournee:null,
    counter: 10
}

const getters = {
    vente: state => state.item,
    ventes: state => state.items,
    error: state => state.error,
    errors: state => state.errors,
    produits: state => state.produits,
    allVentesFours: state => state.ventesFours,
    totalJournee: state => state.totalJournee,
    fournisseurProduitsVendus: state => {
        const allVente = []
        //console.log(state.items);
        state.items.map(ventes => {
            ventes.venteProduits.forEach(vente => {
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
        state.vente = Object.assign(state, null)
    },
    setProduit(state, item) {
        state.item.produit.push(item.id);
    },
    [types.SET_PROD_ITEM](state, produits) {
        Object.assign(state, { produits })
    },
    addProduit(state) {
        state.items.push({ id: state.counter++ });
    },
    addVente(state, item) {
        state.items.push(item);
    },
    allVentesFours(state, ventesFours) {
        Object.assign(state, { ventesFours })
    },
    totalJournee(state, totalJournee) {
        state.totalJournee = totalJournee
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}