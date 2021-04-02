<script>
export default {
	name: 'CategoriesNavigation',
    props: {
        currentCategoryModel: {
            type: [String, Number],
            required: false,
            default: ''
        },
    },

    computed: {
        categories() {
            return this.$store.state.categories;
        },
    },

    methods: {
        chooseCategory(categoryId) {
            this.$emit('update:modelCurrentCategory', categoryId);
        }
    },

    mounted() {
        this.$store.dispatch("getCategories");
    }
}

</script>

<template>
    <div class="block-categories">
        <div class="container">
            <nav aria-label="Catégories" class="py-4 block-categories__list-wrapper">
                <ul class="w-100 mb-0 d-flex flex-nowrap justify-content-start align-items-start list-unstyled block-categories__list">

                    <li @click="chooseCategory('')" v-bind:class="[currentCategoryModel === '' ? 'active' : '']" class="text-center flex-grow-0 flex-shrink-0 block-categories__list-item">
                        <div class="w-100 d-flex justify-content-center align-items-center">
                            <div class="mx-2 my-1 d-flex justify-content-center align-items-center block-categories__icon-wrapper">
                                <img src="https://i.ibb.co/HHSSY3K/3602353.png" alt="Toutes les catégories" class="block-categories__icon">
                            </div>
                        </div>
                        <h6 class="mt-2 block-categories__name">Toutes</h6>
                    </li>

                    <li @click="chooseCategory(category.id)" v-for="category in categories" v-bind:key="category.id" v-bind:class="[category.id == currentCategoryModel ? 'active' : '']" class="mx-3 text-center flex-grow-0 flex-shrink-0 block-categories__list-item">
                        <div class="w-100 d-flex justify-content-center align-items-center">
                            <div class="mx-2 my-1 d-flex justify-content-center align-items-center block-categories__icon-wrapper">
                                <img :src="category.icon" :alt="category.name" class="block-categories__icon">
                            </div>
                        </div>
                        <h6 class="mt-2 mb-0 block-categories__name">{{ category.name }}</h6>
                    </li>

                </ul> 
            </nav>
        </div>
    </div>
</template>

<style lang="scss">

.block-categories {
    background-color: $off-white;

    &__list-wrapper {
        white-space: nowrap;
        overflow-x: scroll;
    }

    &__list-item {
        width: 7rem;
        overflow: hidden;
        opacity: 0.5;

        &:hover {

            & .block-categories__icon-wrapper {
                transform: scale(1.1);
            }

            & .block-categories__name {
                color: $primary-color;
            }
        }
    }

    &__icon {
        width: 3rem;
        height: auto;
    }

    &__icon-wrapper {
        height: 5rem;
        width: 5rem;
        border-radius: 50%;
        background-color: $white;
        cursor: pointer;
        transform: scale(1);
        transition: transform 500ms ease-out;
    }

    &__name {
        color: $dark;
        cursor: pointer;
        white-space: normal;
        transition: color 300ms ease-out;
    }
}

.active {
    &.block-categories__list-item{
        opacity: 1;
    }

    & .block-categories__icon-wrapper {
        border: 2px solid $primary-color;
    }

    & .block-categories__name {
        color: $primary-color;
    }
}

</style>