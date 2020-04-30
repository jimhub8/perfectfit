import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

// import myUser from './components/users/'



import myDashboard from './components/dashboard'
import myUsers from './components/users'
import MyRoles from './components/users/roles'
import myProducts from './components/product'
import myClients from './components/clients'
import mySchools from './components/schools'
// import myDiscount from './components/discount'
import mySales from './components/sales'
import EditProduct from './components/product/edit'
import myMenu from './components/menu'
import myCategory from './components/menu/category'
import myBrand from './components/brand'
import mySubcategory from './components/menu/category/subcategory'
import mySellers from './components/sellers'

// // Settings
// import myCurrency from './components/settings/currency'
import productOptions from './components/settings/products'
import mySlider from './components/settings/slider'


const routes = [
    { path: '/', component: myDashboard },
    { path: '/users', component: myUsers },
    { path: '/roles', component: MyRoles },
    { path: '/products', component: myProducts, name: 'products' },
    { path: '/clients', component: myClients },
    { path: '/schools', component: mySchools },
    { path: '/sales', component: mySales },
    { path: '/sellers', component: mySellers },
    // { path: '/discount', component: myDiscount },
    { path: '/product/:id', component: EditProduct, name: 'editProduct' },

    { path: '/menu', component: myMenu },
    { path: '/category', component: myCategory },
    { path: '/brand', component: myBrand },
    { path: '/subcategory', component: mySubcategory },


    { path: '/product_option', component: productOptions },
    { path: '/slider', component: mySlider },
]


export default new VueRouter({routes})
