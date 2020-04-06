import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

// import myUser from './components/users/'
import myProduct from './components/shop'
import myHomepage from './components/homepage'
import myCart from './components/cart/CartHome'
import myCheckout from './components/checkout'
import myAccount from './components/account'
import myThanks from './components/checkout/Thankyou'


const routes = [
    { path: '/', component: myHomepage },
    { path: '/products', component: myProduct, name: 'shop' },
    { path: '/cartHome', component: myCart },
    { path: '/checkout', component: myCheckout, name: 'checkout' },

    { path: '/account', component: myAccount },

    { path: '/thankyou', component: myThanks, name: 'thankyou' },

]

export default new VueRouter({routes})
