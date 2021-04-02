import { createStore } from 'vuex'
import auth from './auth'
import {mutations} from './mutations';
import {actions} from './actions';
import crud from './modules/crud'

// API root endpoint
export const ENDPOINT = 'http://127.0.0.1:8000/api/';

export default createStore({
  state: {
    products: [],
    product: {},
    categories: [],
    category: {},
    regions: [],
    region: {}
  },

  getters: {
    productsNames(state) {
      let productsNames = [];
      for(const product of state.products) {
        productsNames.push(product.name);
      }
      return productsNames;
    },

    categoriesNames(state) {
      let categoriesNames = [];
      for(const category of state.categories) {
        categoriesNames.push(category.name);
      }
      return categoriesNames;
    },

    regionsNames(state) {
      let regionsNames = [];
      for(const region of state.regions) {
        regionsNames.push(region.name);
      }
      return regionsNames;
    }

  },

  mutations,

  actions,

  modules: {
    auth,
    crud,
  }
})
