<template>
<div>
    <myProducts />
    <!-- <mySlider></mySlider>
    <myPolicy></myPolicy>
    <mySteps></mySteps>
    <myDeals></myDeals>
    <myLogo></myLogo> -->
</div>
</template>

<script>
import myProducts from './Product'
// import mySlider from '../inc/slider'
// import myPolicy from './policy_area'
// import myDeals from './deals'
// import mySteps from './steps'
// import myLogo from './logo_slider'
export default {
    props: ['user'],
    components: {
        myProducts
        // mySlider,
        // myPolicy,
        // myDeals,
        // mySteps,
        // myLogo
    },
}
</script>

<style lang="scss" scoped>

</style>
