<template>
<div class="col-xs-12 col-md-9 shop-content">
    <div class="shop-banner">
        <img src="https://d29u17ylf1ylz9.cloudfront.net/bege-v2/images/banner/shop-category.jpg" alt="">
    </div>
    <div class="product-toolbar">
        <div class="topbar-title">
            <h1>Shop</h1>
        </div>
        <div class="product-toolbar-inner">
            <div class="product-view-mode">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#grid"><i class="ion-grid"></i></a></li>
                    <li><a data-toggle="tab" href="#list"><i class="ion-navicon"></i></a></li>
                </ul>
            </div>
            <p class="woocommerce-result-count">Showing 1–12 of 42 results</p>
            <div class="woocommerce-ordering">
                <form method="get" class="woocommerce-ordering hidden-xs">
                    <div class="orderby-wrapper">
                        <label>Sort By :</label>
                        <select class="nice-select-menu orderby" style="display: none;">
                            <option dara-display="Select">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                        <div class="nice-select nice-select-menu orderby" tabindex="0"><span class="current">Default sorting</span>
                            <ul class="list">
                                <li data-value="Default sorting" class="option selected">Default sorting</li>
                                <li data-value="popularity" class="option">Sort by popularity</li>
                                <li data-value="rating" class="option">Sort by average rating</li>
                                <li data-value="date" class="option">Sort by newness</li>
                                <li data-value="price" class="option">Sort by price: low to high</li>
                                <li data-value="price-desc" class="option">Sort by price: high to low</li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="shop-page-product-area tab-content">
            <div id="grid" class="tab-pane fade in show active">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-xl-3" v-for="product in products.data" :key="product.id">
                        <div class="single-product-area">
                            <div class="product-wrapper gridview">
                                <div class="list-col4">
                                    <div class="product-image">
                                        <a href="">
                                            <img src="https://d29u17ylf1ylz9.cloudfront.net/bege-v2/images/product/1.jpg" alt="">
                                        </a>
                                        <div class="quickviewbtn">
                                            <v-btn text icon style="color:white" @click="showItem(product)">
                                                <v-icon>visibility</v-icon>
                                            </v-btn>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-col8">
                                    <div class="product-info">
                                        <h2><a href="single-product.html">{{ product.product_name }}</a></h2>
                                        <span class="price">
                                            <del>KES 85.00</del> KES {{ product.price }}
                                        </span>
                                    </div>
                                    <div class="product-hidden">
                                        <div class="add-to-cart">
                                            <a  @click="addToCart(product)">Add to cart</a>
                                            <!-- <v-btn color="primary" @click="addToCart(product)">Add to cart</v-btn> -->
                                        </div>
                                        <div class="star-actions">
                                            <div class="product-rattings">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star-half-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            </div>
                                            <ul class="actions">
                                                <li><a href=""><i class="ion-android-favorite-outline"></i></a></li>
                                                <li><a href=""><i class="ion-ios-shuffle-strong"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <nav class="woocommerce-pagination">
        <v-app>
            <v-pagination v-model="products.current_page" :length="products.last_page" total-visible="5" @input="next_page(products.path, products.current_page)" circle></v-pagination>
        </v-app>
    </nav>
    <myShow></myShow>
</div>
</template>

<script>
import myShow from './Show'
export default {
    components: {
        myShow,
    },
    methods: {
        showItem(product) {
            eventBus.$emit('viewProEvent', product)
        },
        getProducts() {
            var payload = {
                model: '/filter_products',
                update: 'updateProductsList',
                data: this.$route.params.data
            }
            this.$store.dispatch("filterItems", payload);
        },

        next_page(path, page) {
            var payload = {
                path: path,
                page: page,
                update_list: 'updateProductsList'
            }
            this.$store.dispatch("nextPage", payload);
        },

        addToCart(cart) {
            console.log(cart);

            // if (cart.product_variants.length > 0) {
            //     eventBus.$emit('selectVariantsEvent', cart)
            //     // this.select_variants()
            //     return
            // }
            cart.order_qty = 1
            eventBus.$emit("addCartEvent", cart);
        },
    },
    computed: {
        products() {
            return this.$store.getters.products
        }
    },
    mounted() {
        console.log(this.$route.params.data);

        this.getProducts();
    },
}
</script>

<style scoped>
img {
    height: auto !important;
    ;
    max-width: 100% !important;
    ;
}
</style>
