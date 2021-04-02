import { ENDPOINT } from './../index';


const state = () => ({
})

const mutations = {
}

const actions = {
    // products related actions 

    async createProduct ({ commit }, createdProduct) {
        // create a new product from crud
        let response = await fetch(ENDPOINT + 'products', {
            method: 'POST', 
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(createdProduct)});

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const newProduct= await response.json();

        commit('ADD_PRODUCT', newProduct);
    },

    async editProduct ({ commit }, editedProduct) {
        // edit an existing product from crud
        let response = await fetch(ENDPOINT + 'products/' + editedProduct.id, {
            method: 'PUT', 
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(editedProduct.body)});

        if (!response.ok) {
            const errors = await response.json();
            const message = `An error has occured: ${response.status}`;
            console.log(message, errors.errors);
            return null;
        }

        const updatedProduct= await response.json();

        commit('UPDATE_PRODUCT', updatedProduct);
    },

    async deleteProduct ({ commit }, productId) {
        // delete product from crud
        let response = await fetch(ENDPOINT + 'products/' + productId, {
            method: 'DELETE', 
            headers: {'Content-Type': 'application/json'}});

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        commit('REMOVE_PRODUCT', productId);
    },

    // categories related actions

    async createCategory ({ commit }, createdCategory) {
        // create a new category from crud
        let response = await fetch(ENDPOINT + 'categories', {
            method: 'POST', 
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(createdCategory)});

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const newCategory= await response.json();

        commit('ADD_CATEGORY', newCategory);
    },

    async editCategory ({ commit }, editedCategory) {
        // edit an existing category from crud
        let response = await fetch(ENDPOINT + 'categories/' + editedCategory.id, {
            method: 'PUT', 
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(editedCategory.body)});

        if (!response.ok) {
            const errors = await response.json();
            const message = `An error has occured: ${response.status}`;
            console.log(message, errors.errors);
            return null;
        }

        const updatedCategory= await response.json();

        commit('UPDATE_CATEGORY', updatedCategory);
    },

    async deleteCategory ({ commit }, categoryId) {
        // delete category from crud
        let response = await fetch(ENDPOINT + 'categories/' + categoryId, {
            method: 'DELETE', 
            headers: {'Content-Type': 'application/json'}});

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        commit('REMOVE_CATEGORY', categoryId);
    },

    // regions related actions

       async createRegion ({ commit }, createdRegion) {
        // create a new region from crud
        let response = await fetch(ENDPOINT + 'regions', {
            method: 'POST', 
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(createdRegion)});

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        const newRegion= await response.json();

        commit('ADD_REGION', newRegion);
    },

    async editRegion ({ commit }, editedRegion) {
        // edit an existing region from crud
        let response = await fetch(ENDPOINT + 'regions/' + editedRegion.id, {
            method: 'PUT', 
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(editedRegion.body)});

        if (!response.ok) {
            const errors = await response.json();
            const message = `An error has occured: ${response.status}`;
            console.log(message, errors.errors);
            return null;
        }

        const updatedRegion= await response.json();

        commit('UPDATE_REGION', updatedRegion);
    },

    async deleteRegion ({ commit }, regionId) {
        // delete region from crud
        let response = await fetch(ENDPOINT + 'regions/' + regionId, {
            method: 'DELETE', 
            headers: {'Content-Type': 'application/json'}});

        if (!response.ok) {
            const message = `An error has occured: ${response.status}`;
            console.log(message);
            return null;
        }

        commit('REMOVE_REGION', regionId);
    }
}

export default {
    state,
    mutations,
    actions
}
