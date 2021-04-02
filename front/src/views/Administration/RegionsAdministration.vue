<template>
    <div>
        <div class="container">
            <div class="mt-5 mb-4">
                <router-link :to="{ name: 'Administration' }" class="btn btn-secondary mb-3">Retour au choix de la table</router-link>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <h3 class="mb-2 mt-2">Régions</h3>
                    <router-link :to="{ name: 'RegionCreation' }" class="btn btn-primary mb-2">Ajouter une région</router-link>
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
                            <tr v-for="region in displayedRegions" v-bind:key="region.id">
                                <th scope="row">{{ region.id }}</th>
                                <td>{{ region.name }}</td>
                                <td class="">
                                    <router-link :to="{ name: 'RegionUpdate', params: { id: region.id } }" class="btn btn-success mr-1 mb-1">Modifier</router-link>
                                    <button @click.prevent="deleteRegion(region.id)" href="#" class="btn btn-danger mb-1">Supprimer</button>
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
        v-if="isRegionOpen"
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
  name: 'RegionsAdministration',
  components: {
      Pagination
  },

  data() {
    return {
      regionsPerPage: 15,
      page: 1,
      pages: [],
      lastPage: 1
    }
  },

  computed: {
    regions() {
      return this.$store.state.regions;
    },

    displayedRegions () {
	  return this.paginate(this.regions);
	},

    isRegionOpen () {
      return (this.$route.name === 'RegionCreation' || this.$route.name === 'RegionUpdate');
    }
  },

  methods: {
    close () {
      this.$router.push({ name: 'RegionsAdministration' })
    },

    setPages() {
      // reinitialize pages array before re running the method 
      this.pages = [];
      
      let numberOfPages = Math.ceil(this.regions.length/this.regionsPerPage);
      this.lastPage = numberOfPages;

      for (let i = 1; i <= numberOfPages; i++) {
		this.pages.push(i);
      }
    },

    updatePage(value) {
        this.page = value;
    },

    paginate (regions) {
	  let from = (this.page * this.regionsPerPage) - this.regionsPerPage;
	  let to = (this.page * this.regionsPerPage);
	  return  regions.slice(from, to);
	},

    deleteRegion(regionId) {
      this.$store.dispatch("deleteRegion", regionId);
    },
  },

  watch: {
    regions() {
      this.setPages();
    }
  },

  mounted() {
    this.$store.dispatch("getRegions");
  }
}
</script>

<style lang="scss" scoped>
</style>