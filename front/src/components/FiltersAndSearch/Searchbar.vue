<script>
export default {
	name: 'Searchbar',
    props: {
        searchModel: {
            type: String,
            required: false,
            default: ''
        },
        minPriceModel: {
            type: [String, Number],
            required: false,
            default: ''
        },
        maxPriceModel: {
            type: [String, Number],
            required: false,
            default: ''
        },
        sortingModel: {
            type: String,
            required: false,
            default: ''
        },
    },

    computed: {
        search: {
            get() {
                return this.searchModel
            },
            set(search) {
                this.$emit('update:searchModel', search);
            }
        },

        min_price: {
            get() {
                return this.minPriceModel
            },
            set(minPrice) {
                this.$emit('update:minPriceModel', minPrice);
            }
        },

        max_price: {
            get() {
                return this.maxPriceModel
            },
            set(maxPrice) {
                this.$emit('update:maxPriceModel', maxPrice);
            }
        },

        sorting: {
            get() {
                return this.sortingModel
            },
            set(sorting) {
                this.$emit('update:sortingModel', sorting);
            }
        },
    },

    methods: {
    },
}

// col-4 col-md-6 col-lg-5
</script>

<template>
    <div class="py-4 block-searchbar">
        <div class="container">
            <form @submit.prevent>
                <div class="row align-items-end">
                
                    <div class="col-12 mt-3 mt-md-0 mb-2">
                        <div class="mb-2">
                            <input type="search" name="search" class="form-control" placeholder="Entrez votre recherche..." v-model="search">
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text pr-3">Prix minimum</span>
                            </div>
                            <input type="number" name="min_price" class="form-control" v-model="min_price">
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        <div class="input-group">
                            <div class="input-group-prepend ">
                                <span class="input-group-text">Prix maximum</span>
                            </div>
                            <input type="number" name="max_price" class="form-control" v-model="max_price">
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        <select name="sorting" class="custom-select" v-model="sorting">
                            <option value="">Options de tri</option>
                            <option value="price_asc" >Prix croissant</option>
                            <option value="price_desc">Prix décroissant</option>
                            <option value="alphabet_asc">A -> Z</option>
                            <option value="alphabet_desc">Z -> A</option>
                        </select>
                    </div>

                </div>
            </form>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.block-searchbar {
    background-color: $primary-color;
}

.custom-select, .form-control {
    border: 1px solid $white;
    color: $dark;
}

.input-group-text {
    border: 1px solid $dark;
    background-color: $dark;
    color: $white;
    font-weight: 500;
}
</style>