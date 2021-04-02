<script>
export default {
	name: 'Footer',
    props: {
    },

    computed: {
    },

    methods: {
        toggleVisibility(element){
            if(window.screen.width <= 768) {
                if(element.style.display === 'none') {
                    element.style.display = 'flex';
                } else {
                    element.style.display = 'none';
                }
            }
        }

    }
}

</script>

<template>
    <footer class="footer">
        <div class="container h-100">
            <div class="h-100 w-100 footer__wrapper">
                <div class="h-75 d-flex flex-column justify-content-between footer__section">
                    <h6 class="text-uppercase font-weight-bold footer__section-title">Nous contacter</h6>
                    <div class="mb-2">
                        <i class="bi bi-geo-alt-fill mr-2 footer__section-icon"></i>
                        <span>1, rue Demo 75000 Paris, France</span>
                    </div>
                    <div class="mb-2">
                        <i class="bi bi-telephone-fill mr-2 footer__section-icon"></i>
                        <span>01 71 00 00 00</span>
                    </div>
                    <div class="mb-2">
                        <i class="bi bi-envelope-fill mr-2 footer__section-icon"></i>
                        <span>demo@mesproduitslocaux.fr</span>
                    </div>
                </div>

                <div class="h-75 footer__section">
                    <h6 @click="toggleVisibility($refs.footerInfo)" class="text-uppercase font-weight-bold footer__section-title">Informations</h6>
                    <div class="footer__section-body" ref="footerInfo">
                        <a class="mb-2 footer__section-item">
                            Qui sommes-nous ?
                        </a>
                        <a class="mb-2 footer__section-item">
                            Livraison
                        </a>
                        <a class="mb-2 footer__section-item">
                            Conditions générales de vente
                        </a>
                        <a class="mb-2 footer__section-item">
                            Mentions générales
                    </a>
                    </div>
                </div>

                <div class="h-75 footer__section">
                    <h6 @click="toggleVisibility($refs.footerAccount)" class="text-uppercase font-weight-bold footer__section-title">Mon compte</h6>
                    <div class="footer__section-body" ref="footerAccount">
                        <a class="mb-2 footer__section-item">
                            Mon compte
                        </a>
                        <a class="mb-2 footer__section-item">
                            Historique des achats
                        </a>
                        <a class="mb-2 footer__section-item">
                            Plan du site
                        </a>
                    </div>
                </div>

                <router-link to="/" class="footer__logo-link">
                    <img :src="require('@/assets/map_mpl.png')" alt="Logo Mes Produits Locaux" class="footer__logo">
                </router-link>
            </div>
        </div>
    </footer>
</template>

<style lang="scss" scoped>

.footer {
    background-color: $dark;
    height: auto;

    @media screen and (min-width: #{$phone}) {
        height: 18rem;
    }

    &__wrapper {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 2rem 0;

        @media screen and (min-width: #{$phone}) {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 3rem 0;

        }
    }

    &__logo-link {
        align-self: center;

        @media screen and (min-width: #{$phone}) {
            align-self: auto;
        }
    }

    &__logo {
        width: 7rem;
        height: auto;
        align-self: center;

        @media screen and (min-width: #{$phone}) {
            width: 10rem;
        }
    }

    &__section {
        color: $grey;
        font-size: 0.9rem;
        padding-left: 1rem;
        padding-bottom: 0.5rem;

        @media screen and (min-width: #{$phone}) {
            padding: 0;
        }

        &-body {
            display: none;
            flex-direction: column;
            justify-content: flex-start;

            @media screen and (min-width: #{$phone}) {
                display: flex;
            }
        }

        &-title {
            color: $off-white;
            font-size: 1.1rem;
        }

        &-icon {
            color: $primary-color;
            font-size: 1.1rem;
        }

        &-item {
            color: inherit;
            cursor: pointer;
            text-decoration: none;
            transition: all 300ms ease-out;

            &:hover {
                color: $primary-color;
                transform: translateX(1rem);
            }
        }

    }
}

</style>