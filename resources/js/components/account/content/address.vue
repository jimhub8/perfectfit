<template>
 <el-tabs v-model="activeName" @tab-click="handleClick">
     <el-tab-pane label="Billing Address" name="first">
         <myBilling :user="user"></myBilling>
     </el-tab-pane>
     <el-tab-pane label="Shipping Address" name="second">
         <myShipping :user="user"></myShipping>
     </el-tab-pane>
 </el-tabs>
</template>

<script>
import myBilling from './Billingddress'
import myShipping from './Shippingaddress'
export default {
    components: {
        myShipping, myBilling
    },
    props: ['user'],
    data() {
        return {
            activeName: 'first'

        }
    },
    methods: {
        handleClick(tab, event) {
            console.log(tab, event);
        }
    }

}
</script>
