<template>
<div class="py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <ProductCard v-for="product in displayedProducts" 
            v-bind:product="product" 
            v-bind:key="product.key" />
        </div>
    </div>

    <Pagination
    @update:modelPage = 'updatePage'
    v-bind:modelPage="page"
    v-bind:modelLastPage="lastPage"
    v-bind:modelPages="pages"/>
</div>
</template>

<script>

import ProductCard from './ProductCard.vue'
import Pagination from '@/components/Pagination.vue'


export default {
  name: 'ProductList',

  components: {
    ProductCard,
    Pagination
  },

  data() {
      return {
        productsPerPage: 15,
        page: 1,
        pages: [],
        lastPage: 1
      }

  },

  props: {
    regionId: {
      type: [String, Number],
      required: false,
      default: ''
    },
    categoryId: {
      type: [String, Number],
      required: false,
      default: ''
    },
    minPrice: {
      type: [String, Number],
      required: false,
      default: ''
    },
    maxPrice: {
      type: [String, Number],
      required: false,
      default: ''
    },
    searchTerm: {
      type: String,
      required: false,
      default: ''
    },
    sorting: {
      type: String,
      required: false,
      default: ''
    }, 
  },

  computed: {
    parameters() {
      // generate parameters object from filters passed as props for API request
      return { 'region': this.regionId, 
        'category': this.categoryId, 
        'min_price': this.minPrice, 
        'max_price': this.maxPrice, 
        'search': this.searchTerm, 
        'sorting': this.sorting };
    },

    products() {
      // return the products array from state which has been set as the API GET request result
      return this.$store.state.products;
    },

    displayedProducts () {
	  return this.paginate(this.products);
	},
  },

  watch: {
    parameters: function() {
      // send new GET request to API with new parameters every time parameters change
      this.$store.dispatch("getFilteredProducts", this.parameters);
    },

    products() {
      // at every new set of products returned go back to page 1 and recalculate pages
      this.page = 1;
      this.setPages();
    }
  },

  methods: {
    setPages() {
      // reinitialize pages array before re running the method 
      this.pages = [];

      let numberOfPages = Math.ceil(this.products.length/this.productsPerPage);
      this.lastPage = numberOfPages;

      for (let i = 1; i <= numberOfPages; i++) {
		this.pages.push(i);
      }
    },

    updatePage(value) {
      this.page = value;
    },

    paginate (products) {
	  let from = (this.page * this.productsPerPage) - this.productsPerPage;
	  let to = (this.page * this.productsPerPage);
	  return  products.slice(from, to);
	},
  },

  mounted() {
    // send GET request to API to get the products info corresponding to the passed parameters
    this.$store.dispatch("getFilteredProducts", this.parameters);
  },
}
</script>

<style scoped>
</style>