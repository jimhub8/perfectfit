<template>
<div class="col-xs-12 col-md-3 sidebar-shop">
    <div class="sidebar-product-categori">
        <!-- <div class="product-filter mb-30">
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
            </div> -->
        <div class="product-filter mb-30">
            <v-btn rounded @click="openStepper" text style="border: 1px solid rgb(62, 164, 221); padding: 0 16px 45px 0;color: rgb(62, 164, 221);">
                <svg width="80px" class="pulse" x="0px" y="0px" viewBox="0 0 100 100">
                    <circle class="pulse-disk" cx="50" cy="50" />
                    <circle class="pulse-circle" cx="50" cy="50" stroke-width="2" />
                    <circle class="pulse-circle-2" cx="50" cy="50" stroke-width="2" />
                </svg>
                <small style="margin-top: -17px;">Place an order</small>
            </v-btn>
        </div>
        <VDivider/>
        <div class="widget-title">
            <h3>CATEGORIES</h3>
        </div>
        <div class="widget-content">
            <!-- <ul class="product-categories">
                <li class="cat-item">
                    <a href="#">School uniform</a>
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
            </ul> -->
            <el-collapse accordion>
                <el-collapse-item v-for="(menu, index) in menus.data" :key="menu.id" :name="index">
                    <template slot="title">
                        {{ menu.menu }}
                        <!-- <i class="header-icon el-icon-info"></i> -->
                    </template>
                    <ul class="list-group">
                        <li class="list-group-item" v-for="category in menu.categories" :key="category.id">{{ category.category }}</li>
                    </ul>
                </el-collapse-item>
            </el-collapse>
        </div>
        <div class="product-filter mb-30">
            <div class="widget-title">
                <h3>SHOP BY</h3>
            </div>
            <div class="widget-content">
                <ul class="list-group">
                    <li class="list-group-item active">MANUFACTURER</li>
                    <li class="list-group-item">Brand A</li>
                    <li class="list-group-item">Brand B</li>
                    <li class="list-group-item">Brand C</li>
                </ul>
            </div>
        </div>
        <div class="sidebar-single-banner">
            <a href="#">
                <img src="http://demo.roadthemes.com/bege/wp-content/uploads/2017/06/shop-sidebar.jpg" alt="Banner">
            </a>
        </div>
    </div>
</div>
</template>

<script>
export default {
    methods: {

        openStepper() {
            eventBus.$emit("openSteppsEvent");
        },
    },
    computed: {
        menus() {
            return this.$store.getters.menu
        }
    },
}
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
    fill: rgb(62, 164, 221);
}

svg:nth-child(1) .pulse-circle,
svg:nth-child(1) .pulse-circle-2 {
    stroke: rgb(62, 164, 221);
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
