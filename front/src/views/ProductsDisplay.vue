<template>
  <div>

    <Searchbar
    @update:searchModel = 'updateSearch' 
    @update:minPriceModel = 'updateMinPrice' 
    @update:maxPriceModel = 'updateMaxPrice' 
    @update:sortingModel = 'updateSorting' 
    v-bind:searchModel="search"
    v-bind:minPriceModel="minPrice"
    v-bind:maxPriceModel="maxPrice"
    v-bind:sortingModel="sorting"/>

    <CategoriesNavigation 
    @update:modelCurrentCategory = 'updateCurrentCategory' 
    v-bind:currentCategoryModel="currentCategory"/>

    <ProductList 
    v-bind:regionId="currentRegion"
    v-bind:categoryId="currentCategory"
    v-bind:minPrice="minPrice"
    v-bind:maxPrice="maxPrice"
    v-bind:searchTerm="search"
    v-bind:sorting="sorting"/>
 
  </div>
</template>

<script>

// @ is an alias to /src
import Searchbar from '@/components/FiltersAndSearch/Searchbar.vue'
import CategoriesNavigation from '@/components/FiltersAndSearch/CategoriesNavigation.vue'
import ProductList from '@/components/ProductList.vue'

export default {
  name: 'Home',
  components: {
    ProductList,
    CategoriesNavigation,
    Searchbar
  },

  data() {
    return {
      currentCategory: '',
      search: '',
      minPrice: '',
      maxPrice: '',
      sorting: ''
    }
  },

  computed: {
    currentRegion() {
      // get browsed region id from route parameters
      return this.$route.params.regionId;
    },
  },

  methods: {
    updateCurrentCategory(categoryId) {
      this.currentCategory = categoryId;
    },
    updateSearch(search) {
      this.search = search;
    },
    updateMinPrice(minPrice) {
      this.minPrice = minPrice;
    },
    updateMaxPrice(maxPrice) {
      this.maxPrice = maxPrice;
    },
    updateSorting(sorting) {
      this.sorting = sorting;
    }
  }
}
</script>