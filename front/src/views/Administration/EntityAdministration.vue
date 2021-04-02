<template>
  <div class="p-4 modal-window">
    <EntityCRUDForm 
        @entity-submission='submitEntity'
        @update:modelName = 'updateName'
        @update:modelIcon = 'updateIcon'
        v-bind:modelId="entityId"
        v-bind:modelName="name"
        v-bind:modelIcon="icon"
        v-bind:modelEntity="entityType"
    />
  </div>
</template>

<script>

// @ is an alias to /src
import EntityCRUDForm from '@/components/Administration/EntityCRUDForm.vue'

export default {
  name: 'EntityAdministration',
  components: {
      EntityCRUDForm
  },

  data() {
    return {
      name: null,
      icon: null
    }
  },

  computed: {
    entityType() {
      // get the type of entity we are administrating
      if (this.$route.name === 'CategoryCreation' || this.$route.name === 'CategoryUpdate') {
        return 'catégorie';
      } else if (this.$route.name === 'RegionCreation' || this.$route.name === 'RegionUpdate') {
        return 'région';
      } else {
        return null;
      }
    },

    entityId() {
      return this.$route.params.id;
    },

    entity() {
      // get the entity to update info
      if(this.entityId) {
        if (this.$route.name === 'CategoryUpdate') {
          return this.$store.state.category;
        } else if (this.$route.name === 'RegionUpdate') {
          return this.$store.state.region;
        } else {
            return null;
        }
      } else {
        return null;
      }
    },

    entitiesNames() {
      // get the names that are already taking for the entity we are administrating (as names must be unique)
      if (this.$route.name === 'CategoryCreation' || this.$route.name === 'CategoryUpdate') {
        return this.$store.getters.categoriesNames;
      } else if (this.$route.name === 'RegionCreation' || this.$route.name === 'RegionUpdate') {
        return this.$store.getters.regionsNames;
      } else {
        return null;
      }
    },

    takenEntityNames() {
      if(this.entityId) {
        // in case of entity update remove current name from taken entity names array so the form validation does not check it against itself
        return this.entitiesNames.filter((entityName) => entityName !== this.entity.name);
      } else {
        return this.entitiesNames;
      }
    }
  },

  watch: {
    entity: function() {
      if(this.entityId) {
        this.name = this.entity.name;
        if (this.$route.name === 'CategoryCreation' || this.$route.name === 'CategoryUpdate') {
          this.icon = this.entity.icon;
        }
      }
    }
  },

  mounted() {
    // in case of an update get the info of the entity to update
    if (this.$route.name === 'CategoryUpdate') {
      this.$store.dispatch("getCategory", this.entityId);
    } else if (this.$route.name === 'RegionUpdate') {
      this.$store.dispatch("getRegion", this.entityId);
    }
  },

  methods: {
    submitEntity(form) {
      // add was validated class to form if not already there to make validation feedback style appear
      if(!form.classList.contains('was-validated')) {
        form.classList.add('was-validated');
      }

      // if all validation criteria passed send corresponding request to API and redirect to right entities management page
      if(form.checkValidity() === true) {
        if(this.$route.name === 'CategoryUpdate') {
          this.$store.dispatch("editCategory", 
            {id: this.entityId, 
            body: {'name': this.name,
            'icon': this.icon}
            });
          this.$router.push({ name: 'CategoriesAdministration' });

        } else if(this.$route.name === 'CategoryCreation') {
          this.$store.dispatch("createCategory", 
            {'name': this.name,
            'icon': this.icon}
          );
          this.$router.push({ name: 'CategoriesAdministration' });

        } else if(this.$route.name === 'RegionUpdate') {
          this.$store.dispatch("editRegion", 
            {id: this.entityId, 
            body: {'name': this.name}
            });
          this.$router.push({ name: 'RegionsAdministration' });

        } else if(this.$route.name === 'RegionCreation') {
          this.$store.dispatch("createRegion", 
            {'name': this.name}
          );
          this.$router.push({ name: 'RegionsAdministration' });

        }
      }
    },

    updateName(value, inputElement, feedbackMessageElement) {
      // check validation requirements
      if(this.takenEntityNames.includes(value)) {
        inputElement.setCustomValidity('Ce nom est déjà utilisé.');
        feedbackMessageElement.innerHTML = 'Ce nom est déjà utilisé.';
        inputElement.reportValidity();
      } else if (value.length > 45 || value.length < 3) {
        inputElement.setCustomValidity('Le nom doit comporter entre 3 et 45 caractères.');
        feedbackMessageElement.innerHTML = 'Le nom doit comporter entre 3 et 45 caractères.';
        inputElement.reportValidity();
      } else {
        inputElement.setCustomValidity('');
        inputElement.reportValidity();
      }
      
      // set new value
      this.name = value;
    },

    updateIcon(value) {
      this.icon = value;
    }

  }
}
</script>

<style lang="scss" scoped>
</style>