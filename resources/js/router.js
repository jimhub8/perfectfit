import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

// import myUser from './components/users/'
import myProduct from './components/shop'
import myHomepage from './components/homepage'
import myCart from './components/cart/CartHome'
import myCheckout from './components/checkout'
import myAccount from './components/account'


const routes = [
    { path: '/', component: myHomepage },
    { path: '/products', component: myProduct, name: 'shop' },
    { path: '/cartHome', component: myCart },
    { path: '/checkout', component: myCheckout },

    { path: '/account', component: myAccount },

]

export default new VueRouter({routes})
