<template>
    <VCardText>
        <div>
            <label for="">Category</label>
            <el-select v-model="form.menus" filterable placeholder="Please enter a keyword" style="width: 100%" value-key="id">
                <el-option v-for="item in menus.data" :key="item.id" :label="item.menu" :value="item">
                </el-option>
            </el-select>
        </div>
        <div style="margin: 20px 0;"></div>
        <div>
        <!-- <div v-if="form.menus.menu == 'School uniform'"> -->
            <label for="">School</label>
            <el-select v-model="form.school" filterable remote reserve-keyword placeholder="Please enter a keyword" :remote-method="schoolSearch" :loading="loading" style="width: 100%" value-key="id">
                <el-option v-for="item in schools.data" :key="item.id" :label="item.name" :value="item">
                </el-option>
            </el-select>
        </div>
        <!-- <div>
            <label for="">Category</label>
            <el-select v-model="form.category" multiple filterable remote reserve-keyword placeholder="Please enter a keyword" :remote-method="categorySearch" :loading="loading" style="width: 100%" value-key="id">
                <el-option v-for="item in form.menus.categories" :key="item.id" :label="item.menu" :value="item">
                </el-option>
            </el-select>
        </div> -->
    </VCardText>
</template>

<script>
export default {
    props: ['form'],
    methods: {
        schoolSearch(search) {
            if (search.length > 2) {
                var payload = {
                    'model': 'school/search_school',
                    'update': 'updateSchoolList',
                    'search': search,
                }
            }
            this.$store.dispatch('searchItems', payload)
        },
    },
    computed: {
        schools() {
            return this.$store.getters.schools
        },
        menus() {
            return this.$store.getters.menu
        },
        loading() {
            return this.$store.getters.loading
        }
    },
}
</script>
