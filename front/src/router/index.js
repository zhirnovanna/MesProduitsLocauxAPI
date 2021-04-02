import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import SignIn from '../views/SignIn.vue'
import SignUp from '../views/SignUp.vue'
import Dashboard from '../views/Dashboard.vue'
import store from '@/store'
import ProductsDisplay from '../views/ProductsDisplay.vue'
import Administration from '../views/Administration/Administration.vue'
import ProductsAdministration from '../views/Administration/ProductsAdministration.vue'
import ProductAdministration from '../views/Administration/ProductAdministration.vue'
import CategoriesAdministration from '../views/Administration/CategoriesAdministration.vue'
import RegionsAdministration from '../views/Administration/RegionsAdministration.vue'
import EntityAdministration from '../views/Administration/EntityAdministration.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/signin',
    name: 'SignIn',
    component: SignIn
  },
  {
    path: '/signup',
    name: 'SignUp',
    component: SignUp
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
    beforeEnter: (to, from, next) => {
      if (!store.getters['auth/authenticated']) {
        return next({
          name: 'SignIn'
        })
      }

      next()
    }
  },
  {
    path: '/region/:regionId',
    name: 'ProductsDisplay',
    component: ProductsDisplay
  },
  {
    path: '/administration',
    name: 'Administration',
    component: Administration
  },
  {
    path: '/administration/products',
    name: 'ProductsAdministration',
    component: ProductsAdministration,
    children: [
      {
        path: '/administration/products/edit/:id',
        name: 'ProductUpdate',
        component: ProductAdministration
      },
      {
        path: '/administration/products/add',
        name: 'ProductCreation',
        component: ProductAdministration
      }
    ]
  },
  {
    path: '/administration/categories',
    name: 'CategoriesAdministration',
    component: CategoriesAdministration,
    children: [
      {
        path: '/administration/categories/edit/:id',
        name: 'CategoryUpdate',
        component: EntityAdministration
      },
      {
        path: '/administration/categories/add',
        name: 'CategoryCreation',
        component: EntityAdministration
      }
    ]
  },
  {
    path: '/administration/regions',
    name: 'RegionsAdministration',
    component: RegionsAdministration,
    children: [
      {
        path: '/administration/regions/edit/:id',
        name: 'RegionUpdate',
        component: EntityAdministration
      },
      {
        path: '/administration/regions/add',
        name: 'RegionCreation',
        component: EntityAdministration
      }
    ]
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
