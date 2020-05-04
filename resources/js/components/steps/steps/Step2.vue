<template>
<VCardText>
    <div>
        <el-checkbox-group v-model="form.category_arr">
            <el-checkbox-button v-for="category in categories" :label="category.category" :key="category.id">{{category.category}}</el-checkbox-button>
        </el-checkbox-group>
    </div>
</VCardText>
</template>

<script>
export default {
    name: 'step2',
    props: ['form'],
    methods: {},
    computed: {
        categories() {
            return this.$store.getters.categories
        },
    },
}
</script>
