<template>
<div style="padding: 10px">
    <div class="policy-area" style="background: #fff;padding: 10px 0">
        <div style="padding: 10px">
            <el-steps :active="5" align-center>
                <el-step title="Step 1" description="Select your school"></el-step>
                <el-step title="Step 2" description="Select uniform category"></el-step>
                <el-step title="Step 3" description="Input size"></el-step>
                <el-step title="Step 4" description="Add to cart"></el-step>
                <el-step title="Step 5" description="Checkout(Place order)"></el-step>
            </el-steps>
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
