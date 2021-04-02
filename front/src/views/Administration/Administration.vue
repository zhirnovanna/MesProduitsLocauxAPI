<template>
    <div class="container">
        <div class="mt-5 mb-4">
            <h3>Administration</h3>

            <p>Quelle table voulez-vous consulter ?</p>

            <div class="d-flex flex-column align-items-center">
                <router-link :to="{ name: 'ProductsAdministration' }" class="btn btn-secondary w-75 mb-3">Produits</router-link>
                <router-link :to="{ name: 'CategoriesAdministration' }" class="btn btn-secondary w-75 mb-3">Catégories</router-link>
                <router-link :to="{ name: 'RegionsAdministration' }" class="btn btn-secondary w-75 mb-3">Régions</router-link>
            </div>

        </div>
    </div>
</template>

<script>

// @ is an alias to /src

export default {
  name: 'Administration',
  components: {
  },
}
</script>