<template>
  <div class="p-4 modal-window">
    <ProductCRUDForm 
        @product-submission='submitProduct'
        @update:modelName = 'updateName'
        @update:modelDescription = 'updateDescription'
        @update:modelPrice= 'updatePrice'
        @update:modelQuantity = 'updateQuantity'
        @update:modelImage = 'updateImage'
        @update:modelCategoryId = 'updateCategoryId'
        @update:modelRegionId = 'updateRegionId'
        v-bind:modelId="productId"
        v-bind:modelName="name"
        v-bind:modelDescription="description"
        v-bind:modelPrice="price"
        v-bind:modelQuantity="quantity"
        v-bind:modelImage="image"
        v-bind:modelCategoryId="categoryId"
        v-bind:modelRegionId="regionId"
        v-bind:modelCategories="categories"
        v-bind:modelRegions="regions"
    />
  </div>
</template>

<script>

// @ is an alias to /src
import ProductCRUDForm from '@/components/Administration/ProductCRUDForm.vue'

export default {
  name: 'ProductAdministration',
  components: {
      ProductCRUDForm
  },

  data() {
    return {
      id: null,
      name: null,
      description: null,
      price: null,
      quantity: null,
      image: null,
      categoryId: null,
      regionId: null
    }
  },

  computed: {
    productId() {
      return this.$route.params.id;
    },

    product() {
      if(this.productId) {
        return this.$store.state.product;
      } else {
        return null;
      }
    },

    categories() {
      return this.$store.state.categories;
    },

    regions() {
      return this.$store.state.regions;
    },

    productsNames() {
      return this.$store.getters.productsNames;
    },

    takenProductNames() {
      if(this.productId) {
        // in case of product update remove current name from taken product names array so the form validation does not check it against itself
        return this.productsNames.filter((productName) => productName !== this.product.name);
      } else {
        return this.productsNames;
      }
    }
  },

  watch: {
    product: function() {
      if(this.productId) {
        this.id = this.productId;
        this.name = this.product.name;
        this.description = this.product.description;
        this.updatePrice(this.product.price);
        this.updateQuantity(this.product.quantity);
        this.updateImage(this.product.image);
        this.updateCategoryId(this.product.category_id);
        this.updateRegionId(this.product.region_id);
      }
    }
  },

  mounted() {
    this.$store.dispatch("getCategories");
    this.$store.dispatch("getRegions");

    // in case of an update get the info of the product to update
    if(this.productId) {
      this.$store.dispatch("getProduct", this.productId);
    }
  },

  methods: {
    submitProduct(form) {
      // add was validated class to form if not already there to make validation feedback style appear
      if(!form.classList.contains('was-validated')) {
        form.classList.add('was-validated');
      }

      // if all validation criteria passed send request to API and redirect to products management page
      if(form.checkValidity() === true) {
        if(this.productId) {
          this.$store.dispatch("editProduct", 
            {id: this.productId, 
            body: {'name': this.name, 
              'description' : this.description,
              'price' : this.price,
              'quantity' : this.quantity,
              'image' : this.image,
              'category_id' : this.categoryId,
              'region_id' : this.regionId
          }});

        } else {
          this.$store.dispatch("createProduct", 
            {'name': this.name, 
              'description' : this.description,
              'price' : this.price,
              'quantity' : this.quantity,
              'image' : this.image,
              'category_id' : this.categoryId,
              'region_id' : this.regionId
            }
          );
        }
        this.$router.push({ name: 'ProductsAdministration' });
      }
    },

    updateName(value, inputElement, feedbackMessageElement) {
      // check validation requirements
      if(this.takenProductNames.includes(value)) {
        inputElement.setCustomValidity('Ce nom est déjà utilisé.');
        feedbackMessageElement.innerHTML = 'Ce nom est déjà utilisé.';
        inputElement.reportValidity();
      } else if (value.length > 45 || value.length < 10) {
        inputElement.setCustomValidity('Le nom doit comporter entre 10 et 45 caractères.');
        feedbackMessageElement.innerHTML = 'Le nom doit comporter entre 10 et 45 caractères.';
        inputElement.reportValidity();
      } else {
        inputElement.setCustomValidity('');
        inputElement.reportValidity();
      }
      
      // set new value
      this.name = value;
    },

    updateDescription(value, textareaElement, feedbackMessageElement) {
      // check validation requirements
      if (value.length > 1000) {
        textareaElement.setCustomValidity('La description ne peut comporter que 1000 caractères maximum.');
        feedbackMessageElement.innerHTML = 'La description ne peut comporter que 1000 caractères maximum.';
        textareaElement.reportValidity();
      } else if (!value) {
        textareaElement.setCustomValidity('La description ne peut pas être vide.');
        feedbackMessageElement.innerHTML = 'La description ne peut pas être vide.';
        textareaElement.reportValidity();
      } else {
        textareaElement.setCustomValidity('');
        textareaElement.reportValidity();
      }

      // set new value
      this.description = value;
    },
    
    updatePrice(value) {
        this.price = value;
    },

    updateQuantity(value) {
        this.quantity = value;
    },

    updateImage(value) {
        this.image = value;
    },

    updateCategoryId(value) {
        this.categoryId = value;
    },

    updateRegionId(value) {
        this.regionId = value;
    },

  }
}
</script>

<style lang="scss" scoped>
</style>