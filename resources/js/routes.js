import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


export const routes = [
    {
        path: '/',
        component: require('./components/views/main/main-component').default
    },
    {
        path: '/teams',
        component: require('./components/views/teams/team').default,
        name: "teams",
    },
    {
        path: '/products',
        component: require('./components/views/products/products').default,
        name:"products"
    },
    {
        path: '/products/:id',
        component: require('./components/views/products/products-details').default
        
    },
    {
        path: '/career',
        component: require('./components/views/career/career').default,
        name: "career",
    },
    {
        path: '/contact-us',
        component: require('./components/views/contact/contact-us').default,
        name: "contact-us",
    },
  ]
