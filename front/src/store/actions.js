import { ENDPOINT } from './index';


export const actions = {
    async getAllProducts ({ commit }) {
        // get all products
        let response = await fetch(ENDPOINT + 'products');

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const data = await response.json();

        commit('SET_PRODUCTS', data);
    },

    async getFilteredProducts ({ commit }, parameters) {
        // get a filtered set of products
        // possible parameters are region, category, max_price, min_price, search, sorting
        // pass empty strings for unneeded parameters
        let response = await fetch(ENDPOINT + 'products?region=' + parameters.region 
                                    + '&category=' + parameters.category
                                    + '&min_price=' + parameters.min_price
                                    + '&max_price=' + parameters.max_price
                                    + '&search=' + parameters.search
                                    + '&sorting=' + parameters.sorting);

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const data = await response.json();

        commit('SET_PRODUCTS', data);
    },

    async getProduct ({ commit }, productId) {
        // get one product data by id
        let response = await fetch(ENDPOINT + 'products/' + productId);

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const data = await response.json();

        commit('SET_PRODUCT', data);
    },

    async getRegions ({ commit }) {
        // get all products
        let response = await fetch(ENDPOINT + 'regions');

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const data = await response.json();

        commit('SET_REGIONS', data);
    },

    async getRegion ({ commit }, regionId) {
        // get one region data by id
        let response = await fetch(ENDPOINT + 'regions/' + regionId);

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const data = await response.json();

        commit('SET_REGION', data);
    },

    async getCategories ({ commit }) {
        // get all products
        let response = await fetch(ENDPOINT + 'categories');

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const data = await response.json();

        commit('SET_CATEGORIES', data);
    },

    async getCategory ({ commit }, categoryId) {
        // get one category data by id
        let response = await fetch(ENDPOINT + 'categories/' + categoryId);

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const data = await response.json();

        commit('SET_CATEGORY', data);
    },
}