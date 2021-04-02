<template>
  <div>
    <div class="col my-2">
      <div class="card product-card">
        <img :src="product.image" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title"> {{product.name}} </h5>
            <p class="card-text">{{product.price}} €</p>
            <div class="btn">
                <div class="btn-detail">
                  <button @click="toggleModale" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Voir le détail">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
                <div class="btn-qtt">
                  <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Noter ce produit">
                    <i class="bi bi-heart"></i>
                  </button>
                </div>
                <div class="btn-like">
                  <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Quantité">
                    <i class="bi bi-hash"></i>
                  </button>
                </div>
                <div class="btn-cart">
                  <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Ajouter au panier">
                    <i class="bi bi-basket3"></i>
                  </button>
                </div>
            </div>
        </div>
      </div>
    </div>

    <ProductModale 
    v-bind:revele="revele" 
    v-bind:toggleModale="toggleModale"
    v-bind:product="product" />

  </div>
</template>

<script>
import ProductModale from './ProductModale.vue'

export default {
  name: 'Product',
  props: {
    product: {
      tyoe: Object,
      required: false
    }
  },

  data() {
    return{
      revele:false,
    }
  },

  components: {
    ProductModale
  },

  methods: {
    toggleModale: function() {
      this.revele = !this.revele;
    },
  },
}
</script>

<style scoped>

.product-card {
  width: 18rem;
}

.card-text {
    color: #6fae1d;
}

.btn{
  display: flex;                  /* establish flex container */
  flex-direction: row;            /* default value; can be omitted */
  flex-wrap: nowrap;              /* default value; can be omitted */
  justify-content: space-between; /* switched from default (flex-start, see below) */
}
</style>
