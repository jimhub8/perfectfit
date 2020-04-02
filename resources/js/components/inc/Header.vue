<template>
<div>
    <myStepper></myStepper>

    <header class="header-area">
        <!-- Header top area start -->
        <div class="header-top-area">
            <div style="padding: 0 10px">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="top-bar-left">
                            <!-- welcome -->
                            <div class="welcome">
                                <p>Kenya's Fastest Online Shopping Destination</p>
                                <v-btn color="info" @click="getCart">Get cart</v-btn>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="topbar-nav">
                            <div class="wpb_wrapper">
                                <!-- my account -->
                                <div class="menu-my-account-container">
                                    <a href="#" style="color: #fff">My Account <i class="fa fa-angle-down"></i></a>
                                    <ul>
                                        <li>
                                            <router-link to="/account" class="pull-right">My Account</router-link>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar area end -->
        <!-- Header middle area start -->
        <div class="header-middle-area">
            <div style="padding: 0 10px">
                <div class="row">
                    <div class="col-xl-2 col-md-12">
                        <!-- site-logo -->
                        <div class="site-logo">
                            <a href="index.html">
                                <img src="https://d29u17ylf1ylz9.cloudfront.net/bege-v2/images/logo/logo-white.png" alt="Nikado"></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <!-- header-search -->
                        <div class="header-search clearfix">
                            <div class="category-select pull-right">
                                <select class="nice-select-menu" style="display: none;">
                                    <option data-display="All Categories">All Categories</option>
                                    <option value="1">Decor &amp; Furniture</option>
                                    <option value="2">Electronics</option>
                                    <option value="3">Fashion &amp; clothings</option>
                                    <option value="4" disabled="">Sport &amp; Outdoors</option>
                                    <option value="5">Toy, Kids &amp; Baby</option>
                                </select>
                                <div class="nice-select nice-select-menu" tabindex="0"><span class="current">All Categories</span>
                                    <ul class="list">
                                        <li data-value="All Categories" data-display="All Categories" class="option selected">All Categories</li>
                                        <li data-value="1" class="option">Decor &amp; Furniture</li>
                                        <li data-value="2" class="option">Electronics</li>
                                        <li data-value="3" class="option">Fashion &amp; clothings</li>
                                        <li data-value="4" class="option disabled">Sport &amp; Outdoors</li>
                                        <li data-value="5" class="option">Toy, Kids &amp; Baby</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="header-search-form">
                                <form action="#">
                                    <input type="text" name="search" placeholder="Search product...">
                                    <input type="submit" name="submit" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <!-- shop-cart-menu -->
                        <div class="shop-cart-menu pull-right">
                            <ul>
                                <li>
                                    <el-button type="primary" @click="openStepper" plain>Place an order</el-button>

                                </li>
                                <li><a href="wishlist.html">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li><a href="#">
                                        <span class="cart-icon">
                                            <i class="fa fa-shopping-cart"></i>
                                            <sup>{{ cart_count }}</sup>
                                        </span>
                                        <span class="cart-text">
                                            <span class="cart-text-title">My cart <br> <strong>KSH {{ cart_total }}</strong> </span>
                                        </span>
                                    </a>
                                    <ul>
                                        <li v-for="cart_item in carts" :key="cart_item.id">
                                            <!-- single-shop-cart-wrapper -->
                                            <div class="single-shop-cart-wrapper">
                                                <div class="shop-cart-img">
                                                    <a href="#">
                                                        <img :src="cart_item.name.image" alt=""></a>
                                                </div>
                                                <div class="shop-cart-info">
                                                    <h5><a href="cart.html">{{ cart_item.name.product_name }}</a></h5>
                                                    <span class="price">KSH {{ cart_item.price }}</span>
                                                    <span class="quantaty">Qty: {{ cart_item.quantity }}</span>
                                                    <span class="cart-remove"><a href="#"><i class="fa fa-times"></i></a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <!-- shop-cart-total -->
                                            <div class="shop-cart-total">
                                                <p>Subtotal: <span class="pull-right">KSH {{ cart_total }}</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shop-cart-btn">
                                                <router-link to="/checkout">Checkout</router-link>
                                                <router-link to="/cartHome" class="pull-right">View Cart</router-link>

                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header middle area end -->
        <!-- Header bottom area start -->
        <div class="header-bottom-area">
            <div style="margin-left: 15px">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 hidden-md hidden-sm pull-left category-wrapper">
                        <div class="categori-menu">

                            <span class="categorie-title">
                                <i class="fa fa-bars"></i>Categories
                            </span>
                            <nav>
                                <ul class="categori-menu-list menu-hidden">
                                    <li v-for="menu in menu.data" :key="menu.id">
                                        <a href="#"><span>
                                                <!-- <img src="storage/images/icons/1.png" alt="menu-icon"> -->
                                            </span>{{ menu.menu }}<i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <!-- categori Mega-Menu Start -->
                                        <ul class="ht-dropdown megamenu first-megamenu" v-for="category in menu.categories" :key="category.id">
                                            <!-- Single Column Start -->
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">{{ category.category }}</li>
                                                    <li v-for="subcat in category.subcategories" :key="subcat.id"><a href="#">{{ subcat.subcategory }}</a></li>
                                                </ul>
                                            </li>
                                            <!-- Single Column End -->
                                        </ul>
                                        <!-- categori Mega-Menu End -->
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <!-- main-menu -->
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li class="current">
                                        <router-link to="/">Home</router-link>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu-area">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active" style="display: block;">
                                    <ul class="menu-overflow">
                                        <li>
                                            <router-link to="/">Home</router-link>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header bottom area end -->
    </header>
</div>
</template>

<script>
import myStepper from '../steps'
export default {
    props: ['user'],
    components: {
        myStepper,
    },
    methods: {
        openStepper() {
            eventBus.$emit('openSteppsEvent')
        },

        getMenu() {
            var payload = {
                model: '/menu',
                update_list: 'updateMenuList',
            }
            this.$store.dispatch("getItems", payload);
        },

        getCart() {
            var payload = {
                model: 'getCart',
                update_list: 'updateCartsList',
            }
            this.$store.dispatch('getItems', payload)
        },

        get_cart_total() {
            var payload = {
                model: 'cart_total',
                update_list: 'updateCartTotalList',
            }
            this.$store.dispatch('getItems', payload)
        },
        get_cart_count() {

            var payload = {
                model: 'cart_count',
                update_list: 'updateCartCountList',
            }

            this.$store.dispatch('getItems', payload)

            // axios.get("/cart_count").then(response => {
            //     this.cart_count = response.data;
            // });
        },

        update_cart(cart, quantity) {
            cart.quantity = quantity
            var payload = {
                model: 'update_cart',
                id: cart.id,
                data: cart,
            }
            this.$store.dispatch('postItem', payload).then((res) => {
                this.getCart()
                this.get_cart_total()
                this.get_cart_count()
            })
        },
        addToCart(cart) {
            console.log(cart);
            // eventBus.$emit("progressEvent");
            var payload = {
                model: 'cartAdd',
                id: cart.id,
                data: cart,
            }

            this.$store.dispatch('postItem', payload).then((res) => {
                this.getCart()
                // this.get_cart_total()
                // this.get_cart_count()
            })
        },
    },
    mounted() {
        this.getMenu();
        this.getCart();
        this.get_cart_total()
        this.get_cart_count()
    },

    computed: {
        menu() {
            return this.$store.getters.menu
        },
        cart_count() {
            return this.$store.getters.cart_count
        },
        carts() {
            return this.$store.getters.carts
        },
        cart_total() {
            return this.$store.getters.cart_total
        },

    },
    created() {
        eventBus.$on("addCartEvent", data => {
            this.addToCart(data);
        });

        eventBus.$on("updateCartEvent", data => {
            this.update_cart(data);
        });
    },
}
</script>
