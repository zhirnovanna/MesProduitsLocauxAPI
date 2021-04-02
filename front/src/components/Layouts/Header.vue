<script>
export default {
	name: 'Header',
}

</script>

<template>
    <header class="position-relative header">
        <div class="h-100 px-5 d-flex justify-content-center align-items-center">

            <router-link to="/">
                <img :src="require('@/assets/logo_mpl.png')" alt="Logo Mes Produits Locaux" class="header__logo-large">
                <img :src="require('@/assets/map_mpl.png')" alt="Logo Mes Produits Locaux" class="header__logo-mobile">
            </router-link>

            <router-link to="/" class="position-absolute header__cart">
                <div class="position-relative">
                    <div class="header__cart-count">0</div>
                    <i class="bi bi-cart3 header__cart-icon"></i>
                </div>
            </router-link>
        </div>
    </header>
</template>

<style lang="scss" scoped>

.header {
    height: 5rem;
    box-shadow: $shadow-bottom;

    @media screen and (min-width: #{$phone}) {
        height: 7rem;
    }

    &__logo-large {
        display: none;

        @media screen and (min-width: #{$phone}) {
            display: inline-block;
            width: 30rem;
            height: auto;
        }
    }

    &__logo-mobile {
        display: inline-block;
        width: 4rem;
        height: auto;

        @media screen and (min-width: #{$phone}) {
            display: none;
        }
    }

    &__cart {
        color: $dark;
        transition: color 300ms ease-out;
        right: 2rem;

        @media screen and (min-width: #{$phone}) {
            right: 3rem;
        }

        &:hover {
            color: $primary-color;
        }

        &-icon {
            font-size: 1.7rem;

            @media screen and (min-width: #{$phone}) {
                font-size: 2rem;
            }
        }

        &-count {
            position: absolute;
            top: -0.5rem;
            right: -0.75rem;
            height: 1.2rem;
            width: 1.2rem;
            font-size: 0.75rem;
            background-color: $primary-color;
            border-radius: 50%;
            text-align: center;
            color: $white;

            @media screen and (min-width: #{$phone}) {
                top: -0.6rem;
                right: -1rem;
                height: 1.5rem;
                width: 1.5rem;
                font-size: 1rem;
            }
        }

    }
}

</style>