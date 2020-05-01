<template>
<div>
    <vue-topprogress ref="topProgress" color="red"></vue-topprogress>

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
                                <!-- <v-btn color="info" @click="getCart">Get cart</v-btn> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6" v-if="user">
                        <div class="topbar-nav">
                            <div class="wpb_wrapper">
                                <!-- my account -->
                                <div class="menu-my-account-container">
                                    <a href="#" style="color: #fff">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <router-link to="/account" class="pull-right">My Account</router-link>
                                        </li>
                                        <li v-if="user.is_admin || user.is_seller">
                                            <a href="/admin/dashboard" target="_blank" class="pull-right">Admin panel</a>
                                        </li>

                                        <li>
                                            <form action="/logout" method="post">
                                                <input type="hidden" name="_token" :value="csrf">
                                                <!-- <input type="submit">Logout</v-btn> -->
                                                <input type="submit" value="Signout">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6" v-else>
                        <div class="topbar-nav">
                            <div class="wpb_wrapper">
                                <!-- my account -->
                                <v-btn small href="/login">Sign in</v-btn>
                                <v-btn small href="/register">Sign up</v-btn>
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
                    <div class="col-xl-2 col-md-6">
                        <!-- site-logo -->
                        <div class="site-logo">
                            <router-link to="/"><img src="/site/logo/logo.png" alt="Perfectfit" /></router-link>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <!-- header-search -->
                        <div class="header-search clearfix">
                            <div class="header-search-form">
                                <form action="#">
                                    <input type="text" name="search" placeholder="Search product..." style="width: 100%" />
                                    <input type="submit" name="submit" value="Search" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <!-- shop-cart-menu -->
                        <div class="shop-cart-menu pull-right">
                            <ul>
                                <!-- <li>
                                    <v-btn rounded  @click="openStepper" text style="border: 1px solid #fff; padding: 0 16px 45px 0;color: #fff;">
                                        <svg width="80px"  class="pulse" x="0px" y="0px"  viewBox="0 0 100 100">
                                            <circle class="pulse-disk" cx="50" cy="50" />
                                            <circle class="pulse-circle" cx="50" cy="50" stroke-width="2" />
                                            <circle class="pulse-circle-2" cx="50" cy="50" stroke-width="2" />
                                        </svg>
                                        <small style="margin-top: -17px;">Place an order</small>
                                    </v-btn>
                                </li> -->
                                <li>
                                    <a href="#">
                                        <i class="fa fa-random"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="cart-icon">
                                            <i class="fa fa-shopping-cart"></i>
                                            <sup>{{ cart_count }}</sup>
                                        </span>
                                        <span class="cart-text">
                                            <span class="cart-text-title">
                                                My cart
                                                <br />
                                                <strong>KSH {{ cart_total }}</strong>
                                            </span>
                                        </span>
                                    </a>
                                    <ul>
                                        <li v-for="cart_item in carts" :key="cart_item.id">
                                            <!-- single-shop-cart-wrapper -->
                                            <div class="single-shop-cart-wrapper">
                                                <div class="shop-cart-img">
                                                    <a href="#">
                                                        <img style="width: 70px" :src="cart_item.name.image" alt />
                                                    </a>
                                                </div>
                                                <div class="shop-cart-info">
                                                    <h5>
                                                        <a href="#">{{ cart_item.name }}</a>
                                                    </h5>
                                                    <span class="price">KSH {{ cart_item.price }}</span>
                                                    <span class="quantaty">Qty: {{ cart_item.quantity }}</span>
                                                    <span class="cart-remove">
                                                        <a href="#">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <!-- shop-cart-total -->
                                            <div class="shop-cart-total">
                                                <p>
                                                    Subtotal:
                                                    <span class="pull-right">KSH {{ cart_total }}</span>
                                                </p>
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
                    <!-- <div class="col-xl-3 col-lg-3 hidden-md hidden-sm pull-left category-wrapper">
                        <div class="categori-menu">
                            <span class="categorie-title">
                                <i class="fa fa-bars"></i>Categories
                            </span>
                            <nav>
                                <ul class="categori-menu-list menu-hidden">
                                    <li v-for="menu in menu.data" :key="menu.id">
                                        <a href="#">
                                            <span>
                                            </span>
                                            {{ menu.menu }}
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <ul class="ht-dropdown megamenu first-megamenu" v-for="category in menu.categories" :key="category.id">
                                            <li class="single-megamenu">
                                                <ul>
                                                    <li class="menu-tile">{{ category.category }}</li>
                                                    <li v-for="subcat in category.subcategories" :key="subcat.id">
                                                        <a href="#">{{ subcat.subcategory }}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-9">
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
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Header bottom area end -->
    </header>
</div>
</template>

<script>
import myStepper from "../steps";
export default {
    props: ["user"],
    data() {
        return {

            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        }
    },
    components: {
        myStepper
    },
    methods: {
        openStepper() {
            eventBus.$emit("openSteppsEvent");
        },

        getMenu() {
            var payload = {
                model: "/menu",
                update_list: "updateMenuList"
            };
            this.$store.dispatch("getItems", payload);
        },

        getCart() {
            var payload = {
                model: "getCart",
                update_list: "updateCartsList"
            };
            this.$store.dispatch("getItems", payload);
        },

        get_cart_total() {
            var payload = {
                model: "cart_total",
                update_list: "updateCartTotalList"
            };
            this.$store.dispatch("getItems", payload);
        },
        get_cart_count() {

            var payload = {
                model: "cart_count",
                update_list: "updateCartCountList"
            };

            this.$store.dispatch("getItems", payload);

            // axios.get("/cart_count").then(response => {
            //     this.cart_count = response.data;
            // });
        },

        update_cart(cart, quantity) {
            eventBus.$emit("progressEvent");
            cart.quantity = quantity;
            var payload = {
                model: "update_cart",
                id: cart.id,
                data: cart
            };
            this.$store.dispatch("postItem", payload).then(res => {
                this.getCart();
                this.get_cart_total();
                this.get_cart_count();
                this.success_message('Cart updated');
                eventBus.$emit("StoprogEvent");
            });
        },
        addToCart(cart) {
            eventBus.$emit("progressEvent");
            console.log(cart);
            // eventBus.$emit("progressEvent");
            var payload = {
                model: "cartAdd",
                // id: cart.id,
                data: cart
            };

            this.$store.dispatch("postItems", payload).then(res => {
                this.getCart();
                this.get_cart_total();
                this.get_cart_count();
                this.success_message('Item added to cart');

                eventBus.$emit("StoprogEvent");
            });
        },

        success_message(message) {
            this.$message({
                message: message,
                type: "success"
            });
        },

        error_message(message) {
            this.$message({
                message: message,
                type: "error"
            });
        },
        cartE() {
            this.getCart();
            this.get_cart_total();
            this.get_cart_count();
        },

        blink_btn(event) {
            event.target.style.background = 'red'
            setTimeout(() => {
                event.target.style.background = 'black'
            }, 500);
        }
    },
    mounted() {
        this.getMenu();
        this.getCart();
        this.get_cart_total();
        this.get_cart_count();
    },

    computed: {
        menu() {
            return this.$store.getters.menu;
        },
        cart_count() {
            return this.$store.getters.cart_count;
        },
        carts() {
            return this.$store.getters.carts;
        },
        cart_total() {
            return this.$store.getters.cart_total;
        }
    },
    created() {
        eventBus.$on("addCartEvent", data => {
            this.addToCart(data);
        });

        eventBus.$on("progressEvent", data => {
            this.$refs.topProgress.start();
        });
        eventBus.$on("StoprogEvent", data => {
            this.$refs.topProgress.done();
        });

        eventBus.$on("cartEvent", data => {
            this.cartE();
        });
        eventBus.$on("updateCartEvent", data => {
            this.update_cart(data);
        });

        eventBus.$on("SuccessEvent", data => {
            this.success_message(data);
        });
        eventBus.$on("ErrorEvent", data => {
            this.error_message(data);
        });
    }
};
</script>

<style scoped>
html,
body {
    min-height: 100%;
    height: 100%;
}

body {
    margin: 0;
    background: #202226;
    display: flex;
    justify-content: center;
    align-items: center;
}

svg:not(:root) {
    overflow: hidden;
    margin-top: -17px;
}

svg:nth-child(1) .pulse-disk {
    fill: rgb(45, 220, 150);
}

svg:nth-child(1) .pulse-circle,
svg:nth-child(1) .pulse-circle-2 {
    stroke: rgb(45, 220, 150);
}


.pulse-circle,
.pulse-circle-2 {
    transform-origin: center;
    stroke-width: 2;
    fill: none;
    transform: translate3d(0, 0, 0);
}

.pulse-disk {
    r: 6;
}

.pulse-circle {
    r: 4;
    animation: pulse 3s cubic-bezier(0.39, 0.54, 0.41, 1.5) infinite;
}

.pulse-circle-2 {
    r: 16;
    animation: pulse-2 3s cubic-bezier(0.39, 0.54, 0.41, 1.5) infinite;
}

@keyframes pulse {
    0% {
        r: 4;
    }

    50% {
        r: 16;
        opacity: 1;
    }

    99% {
        opacity: 0;
    }

    100% {
        opacity: 0;
        r: 16;
    }
}

@keyframes pulse-2 {
    0% {
        opacity: 1;
    }

    40% {
        opacity: 0;
    }

    49.99% {
        r: 16;
        opacity: 0;
    }

    50% {
        r: 4;
        opacity: 1;
    }

    100% {
        r: 16;
        opacity: 1;
    }
}
</style>
