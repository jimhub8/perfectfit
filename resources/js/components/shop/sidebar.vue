<template>
    <div class="col-xs-12 col-md-3 sidebar-shop">
        <div class="sidebar-product-categori">
            <div class="product-filter mb-30">
                <div class="widget-title">
                    <h3>Filter by price</h3>
                </div>
                <div class="widget-content">
                    <div id="price-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                        <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span>
                    </div>
                    <div class="price-values">
                        <div class="price_text_btn">
                            <span>Price:</span>
                            <input type="text" class="price-amount">
                        </div>
                        <button class="button" type="submit">Filter</button>
                    </div>
                </div>
            </div>
            <div class="widget-title">
                <h3>SELECT BY COLOR</h3>
            </div>
            <div class="widget-content">
                <ul class="product-categories">
                    <li class="cat-item">
                        <a href="#">Gold</a>
                        <span class="count">(1)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">Green</a>
                        <span class="count">(1)</span>
                    </li>
                    <li class="cat-item">
                        <a href="#">White</a>
                        <span class="count">(1)</span>
                    </li>
                </ul>
            </div>
            <div class="product-filter mb-30">
                <div class="widget-title">
                    <h3>TOP RATED PRODUCTS</h3>
                </div>
                <div class="widget-content">
                    <ul class="product_list_widget">
                        <li class="widget-mini-product">
                            <div class="product-image">
                                <a title="Phasellus vel hendrerit" href="#">
                                    <img alt="" src="images/product/2.jpg">
                                </a>
                            </div>
                            <div class="product-info">
                                <a title="Phasellus vel hendrerit" href="#">
                                    <span class="product-title">Consequuntur magni</span>
                                </a>
                                <div class="star-rating">
                                    <div class="rating-box">
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                    </div>
                                </div>
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>55.00</span>
                            </div>
                        </li>
                        <li class="widget-mini-product">
                            <div class="product-image">
                                <a title="Phasellus vel hendrerit" href="#">
                                    <img alt="" src="images/product/3.jpg">
                                </a>
                            </div>
                            <div class="product-info">
                                <a title="Phasellus vel hendrerit" href="#">
                                    <span class="product-title">Aliquam lobortis</span>
                                </a>
                                <div class="star-rating">
                                    <div class="rating-box">
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                    </div>
                                </div>
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>55.00</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-single-banner">
                <a href="#">
                    <img src="images/banner/shop-sidebar.jpg" alt="Banner">
                </a>
            </div>
            <div class="sidebar-tag">
                <div class="widget-title">
                    <h3>PRODUCT TAGS</h3>
                </div>
                <div class="widget-content">
                    <div class="product-tags">
                        <a href="#">New </a>
                        <a href="#">brand</a>
                        <a href="#">black</a>
                        <a href="#">white</a>
                        <a href="#">chire</a>
                        <a href="#">table</a>
                        <a href="#">Lorem</a>
                        <a href="#">ipsum</a>
                        <a href="#">dolor</a>
                        <a href="#">sit</a>
                        <a href="#">amet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

</style>
