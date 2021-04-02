<script>
export default {
	name: 'EntityCRUDForm',
    props: {
        modelId: {
            type: [String, Number],
            required: false
        },
        modelName: {
            type: String,
            required: false
        },
        modelIcon: {
            type: String,
            required: false
        }, 
        modelEntity: {
            type: String,
            required: true
        }, 
    },

    computed: {
        id: {
            get() {
                return this.modelId
            }
        },

        name: {
            get() {
                return this.modelName
            },
            set(name) {
                this.$emit('update:modelName', name, this.$refs.entityNameInput, this.$refs.entityNameFeedback);
            }
        },

        icon: {
            get() {
                return this.modelIcon
            },
            set(icon) {
                this.$emit('update:modelIcon', icon);
            }
        },
    },
}

</script>

<template>
    <div class="w-100 pt-2 pb-2 d-flex flex-column">
        <h4 v-if="modelId" class="mb-3">Modifier une {{ modelEntity }}</h4>
        <h4 v-else class="mb-3">Ajouter une {{ modelEntity }}</h4>

        <form @submit.prevent="$emit('entity-submission', $refs.entityForm)" ref="entityForm" class="needs-validation" novalidate>
            <input type="hidden" name="id" v-model="id">

            <div class="form-group mb-4">
                <label for="name">Nom de la {{ modelEntity }}</label>
                <input type="text" name="name" id="name" v-model="name" class="form-control" ref="entityNameInput">
                <div class="invalid-feedback" ref="entityNameFeedback"></div>
                <small class="form-text text-muted">Le nom doit comporter 3 à 45 caractères.</small>
            </div>

            <div v-if="modelEntity === 'catégorie'" class="form-group mb-4">
                <label for="icon">Chemin vers de l'icone de la catégorie</label>
                <input type="text" name="icon" id="icon" v-model="icon" class="form-control" maxlength="45" required>
                <div class="invalid-feedback">Le chemin vers l'icone doit comporter 45 caractères maximum.</div>
                <img v-if="icon !== null" :src="icon" alt="Icone de la catégorie" class="d-block m-2">
            </div>

            <input type="submit" value="Valider" class="btn btn-primary">
        </form>
    </div>
</template>

<style lang="scss" scoped>

</style>