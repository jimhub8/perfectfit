<template>
<div class="row">
    <mySidebar></mySidebar>
    <myShop></myShop>
</div>
</template>

<script>
import myShop from './shop'
import mySidebar from './sidebar'
export default {
    components: {
        myShop,
        mySidebar,
    },
}
</script>

<style scoped>

</style>
