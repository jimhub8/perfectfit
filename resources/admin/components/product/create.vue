<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card>
            <v-card-title>
                <span class="headline text-center" style="margin: auto;">Create Product</span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container grid-list-md>
                    <v-layout row wrap>
                        <v-flex xs12 style="padding: 7px 10px 20px 10px;" v-if="user.is_admin">
                            <label for="" style="color: #52627d;">Seller</label>
                            <el-select v-model="form.seller_id" filterable remote reserve-keyword style="width: 100%" placeholder="type at least 3 characters" :remote-method="getSellers" :loading="loading">
                                <el-option v-for="item in sellers.data" :key="item.id" :label="item.name" :value="item.id">
                                </el-option>
                            </el-select>
                        </v-flex>
                        <v-flex xs12 style="padding: 7px 10px 20px 10px;" v-if="user.is_admin">
                            <label for="" style="color: #52627d;">School</label>
                            <el-select v-model="form.school_id" filterable remote reserve-keyword style="width: 100%" placeholder="type at least 3 characters" :remote-method="getSchools" :loading="loading">
                                <el-option v-for="item in schools.data" :key="item.id" :label="item.name" :value="item.id">
                                </el-option>
                            </el-select>
                        </v-flex>
                        <v-flex xs12 style="padding: 7px 10px 20px 10px;">
                            <label for="" style="color: #52627d;">Category</label>
                            <el-select v-model="form.categories" filterable clearable placeholder="Select categories" style="width:100%;" value-key="id">
                                <el-option v-for="item in categories.data" :key="item.id" :label="item.category" :value="item">
                                </el-option>
                            </el-select>
                        </v-flex>
                        <v-flex sm12>
                            <div>
                                <label for="">Product name</label>
                                <el-input placeholder="Product name" v-model="form.product_name"></el-input>
                            </div>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card-text>
            <v-card-actions>
                <v-btn color="blue darken-1" text @click="close">Close</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="save" :loading="loading" :disabled="loading">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</v-layout>
</template>

<script>
export default {
    props: ['user'],
    data: () => ({
        dialog: false,
        loading: false,
        form: {
            product_name: '',

        },
    }),
    created() {
        eventBus.$on("openCreateProduct", data => {
            this.dialog = true;
        });
    },

    methods: {

        save() {
            var payload = {
                model: '/products',
                data: this.form,
            }
            this.$store.dispatch('postItems', payload)
                .then(response => {
                    eventBus.$emit("productEvent")
                });
        },

        close() {
            this.dialog = false;
        },

        getSellers(search) {
            // console.log(search);
            if (search.length > 2) {
                var payload = {
                    model: '/seller/search',
                    update_: 'updateSellerList',
                    search: search
                }
                this.$store.dispatch("searchItems", payload);
            }
        },

        getSchools(search) {
            // console.log(search);
            if (search.length > 2) {
                var payload = {
                    model: '/school/search_school',
                    update_: 'updateSchoolList',
                    search: search
                }
                this.$store.dispatch("searchItems", payload);
            }
        },

        getCategories() {
            var payload = {
                model: '/categories',
                update_list: 'updateCategoryList'
            }
            this.$store.dispatch("getItems", payload);
        },
    },
    mounted() {
        this.getCategories();
    },
    computed: {
        sellers() {
            return this.$store.getters.sellers
        },
        categories() {
            return this.$store.getters.categories;
        },
        schools() {
            return this.$store.getters.schools;
        },
    },
};
</script>
