import * as crud from '../../../utils/crud'
import { namespace } from './mutation_types'

export const getItem = ({ dispatch, commit }, id) =>
  crud.getItem({ dispatch, commit }, namespace, id)

export const getItems = ({ dispatch, commit }, query) =>
  crud.getItems({ dispatch, commit }, namespace, query)

export const create = ({ dispatch, commit,state }) =>
  crud.create({ dispatch, commit, state }, namespace)

export const update = ({ dispatch, commit, state },id) =>
  crud.update({ dispatch, commit, state }, namespace,id)

export const remove = ({ dispatch, commit }, id) =>
  crud.remove({ dispatch, commit }, namespace, id)

export const reset = ({ commit }) => crud.reset({ commit }, namespace)
