<template>
<div>
    <div class="row">
        <mySidebar></mySidebar>
        <myShop></myShop>
    </div>
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
