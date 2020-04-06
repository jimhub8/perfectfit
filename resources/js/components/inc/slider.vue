<template>
<div class="row">
    <div class="slider-hidden col-lg-3"></div>

    <div class="slider col-xl-9">
        <!-- slider-area start -->
        <div class="slider-area-inner">
            <!-- slider start -->
            <div id="wrapper">
                <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
                        <img src="/site/1.jpg" alt="test" title="#slider1" />
                        <img src="/site/2.jpg" title="#slider2" alt="test" />
                        <img src="/site/3.jpg" alt="test" data-transition="slideInLeft" />
                        <img src="/site/4.jpg" alt data-transition="slideInLeft" />

                    </div>

                    <div class="nivo-caption" id="slider1">
                        <div class="slider-progress"></div>
                        <div class="col-md-9">
                            <div class="slider-content slider-content-1 slider-animated-1">
                                <h1 class="hone">INNOVATIVE</h1>
                                <h1 class="htwo">SMARTER</h1>
                                <h1 class="hthree">BRIGHTER</h1>
                                <h3>40” SkyHi Smart Package</h3>
                                <div class="button-1 hover-btn-2">
                                    <a href="shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nivo-caption" id="slider2">
                        <div class="slider-progress"></div>
                        <div class="col-md-9">
                            <div class="slider-content slider-content-2 slider-animated-2">
                                <h1 class="hone">DRONE DIY</h1>
                                <h1 class="htwo">WORKSHOP</h1>
                                <h3 class="h3one">Build &amp; Fly</h3>
                                <h3 class="h3two">Your Own drone!</h3>
                                <div class="button-1 hover-btn-1">
                                    <a href="shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.slider-wrapper #slider,
.theme-default .nivoSlider img {
    height: 525px !important;
    background-repeat: none !important;
}

.nivo-caption {
    background: transparent !important;
}
</style>
