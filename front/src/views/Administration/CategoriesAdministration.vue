<template>
    <div>
        <div class="container">
            <div class="mt-5 mb-4">
                <router-link :to="{ name: 'Administration' }" class="btn btn-secondary mb-3">Retour au choix de la table</router-link>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <h3 class="mb-2 mt-2">Catégories</h3>
                    <router-link :to="{ name: 'CategoryCreation' }" class="btn btn-primary mb-2">Ajouter une catégorie</router-link>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col" class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in displayedCategories" v-bind:key="category.id">
                                <th scope="row">{{ category.id }}</th>
                                <td>{{ category.name }}</td>
                                <td class="">
                                    <router-link :to="{ name: 'CategoryUpdate', params: { id: category.id } }" class="btn btn-success mr-1 mb-1">Modifier</router-link>
                                    <button @click.prevent="deleteCategory(category.id)" href="#" class="btn btn-danger mb-1">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <Pagination
                @update:modelPage = 'updatePage'
                v-bind:modelPage="page"
                v-bind:modelLastPage="lastPage"
                v-bind:modelPages="pages"
            />

        </div>


        <div
        class="modal-bg"
        v-if="isCategoryOpen"
        @click.self="close"
        >
        <router-view/>
        </div>

    </div>

</template>

<script>

// @ is an alias to /src
import Pagination from '@/components/Pagination.vue'

export default {
  name: 'CategoriesAdministration',
  components: {
      Pagination
  },

  data() {
    return {
      categoriesPerPage: 15,
      page: 1,
      pages: [],
      lastPage: 1
    }
  },

  computed: {
    categories() {
      return this.$store.state.categories;
    },

    displayedCategories () {
	  return this.paginate(this.categories);
	},

    isCategoryOpen () {
      return (this.$route.name === 'CategoryCreation' || this.$route.name === 'CategoryUpdate');
    }
  },

  methods: {
    close () {
      this.$router.push({ name: 'CategoriesAdministration' })
    },

    setPages() {
      // reinitialize pages array before re running the method 
      this.pages = [];
      let numberOfPages = Math.ceil(this.categories.length/this.categoriesPerPage);
      this.lastPage = numberOfPages;

      for (let i = 1; i <= numberOfPages; i++) {
		    this.pages.push(i);
      }
    },

    updatePage(value) {
        this.page = value;
    },

    paginate (categories) {
	  let from = (this.page * this.categoriesPerPage) - this.categoriesPerPage;
	  let to = (this.page * this.categoriesPerPage);
	  return  categories.slice(from, to);
	},

    deleteCategory(categoryId) {
      this.$store.dispatch("deleteCategory", categoryId);
    },
  },

  watch: {
	categories() {
	  this.setPages();
	}
  },

  mounted() {
    this.$store.dispatch("getCategories");
  }
}
</script>

<style lang="scss" scoped>
</style>