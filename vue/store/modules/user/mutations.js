import * as types from './mutation_types'
import defaultState from './state'

export default {

  [types.SET_ITEM](state, item) {
    Object.assign(state, { item })
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
  [types.SET_COUNT_USER](state, countUserData){
    Object.assign(state,{countUserData})
  },
  [types.UPDATE_ONE_ITEM](state) {
    state.item = Object.assign({}, state.item)
  },
}
