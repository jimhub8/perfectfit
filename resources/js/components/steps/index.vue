<template>
<v-app>
    <el-dialog title="Follow these steps to filter uniform" :visible.sync="dialog" width="60%" center :close-on-click-modal="false">
        <v-stepper v-model="e1">
            <v-stepper-header>
                <v-stepper-step :complete="e1 > 1" step="1">School & Category</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step :complete="e1 > 2" step="2">Size</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step :complete="e1 > 3" step="3">Confirm</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step :complete="e1 > 4" step="4">Confirm</v-stepper-step>
            </v-stepper-header>
            <v-stepper-items>
                <v-stepper-content step="1">
                    <v-card class="mb-5" color="white lighten-1">
                        <Step1 :form="form" />
                        <VCardActions>

                            <v-btn color="primary" @click="getCategory_items">
                                Continue
                            </v-btn>
                        </VCardActions>
                    </v-card>
                </v-stepper-content>
                <v-stepper-content step="2">
                    <v-card class="mb-5" color="white lighten-1">
                        <Step2 :form="form" />
                        <VCardActions>
                            <v-btn color="primary" @click="GoToStep3">
                                Continue
                            </v-btn>
                            <v-btn text @click="e1 = 1">Back</v-btn>
                        </VCardActions>
                    </v-card>
                </v-stepper-content>
                <v-stepper-content step="3">
                    <vCard class="mb-5" color="white lighten-1">
                        <VCardText>
                            <label for="">Size</label>
                            <el-input placeholder="Please input" v-model="form.size"></el-input>
                            <div style="margin: 20px 0;"></div>
                            <youtube :video-id="videoId"></youtube>
                        </VCardText>

                        <VCardActions>
                            <v-btn color="primary" @click="e1 = 4">
                                Continue
                            </v-btn>
                            <v-btn text @click="e1 = 2">Back</v-btn>
                        </VCardActions>
                    </vCard>
                </v-stepper-content>
                <v-stepper-content step="4">
                    <Step4 :form="form" />

                    <VCardActions>
                        <v-btn color="primary" @click="addToCart">
                            Add to Cart
                        </v-btn>
                        <v-btn text @click="e1 = 3">Back</v-btn>
                    </VCardActions>
                </v-stepper-content>

            </v-stepper-items>
        </v-stepper>
        <span slot="footer" class="dialog-footer">
            <el-button @click="dialog = false">Close</el-button>
            <!-- <el-button type="primary" @click="dialog = false">Confirm</el-button> -->
        </span>
    </el-dialog>
</v-app>
</template>

<script>
import Step1 from './steps/Step1'
import Step2 from './steps/Step2'
import Step4 from './steps/Step4'
export default {
    components: {
        Step1,
        Step2,
        Step4
    },
    data() {
        return {
            dialog: false,
            e1: 1,
            form: {
                school: [],
                menus: [],
                category_arr: [],
                category_new: [],
            },
            videoId: "https://www.youtube.com/watch?v=mSx-dRURkKc&list=RDJPbXGIm7dqY&index=11"
        }
    },
    methods: {
        categorySearch(search) {
            if (search.length > 2) {
                var payload = {
                    'model': 'search_menu',
                    'update': 'updateMenuList',
                    'search': search,
                    'data': this.form,
                }
            }
            this.$store.dispatch('searchPostItems', payload)
        },

        getMenu() {
            var payload = {
                model: "/menu",
                update_list: "updateMenuList"
            };
            this.$store.dispatch("getItems", payload);
        },
        filterItems() {
            this.$router.push({
                name: "shop",
                params: {
                    data: this.form
                }
            });
            this.dialog = false
        },

        addToCart(cart) {
            // console.log(cart);
            cart.order_qty = 1
            eventBus.$emit("addCartEvent", this.form);
        },

        getCategory_items() {
            var payload = {
                model: '/filter_category',
                update: 'updateCategoryList',
                data: this.form
            }
            this.$store.dispatch("filterItems", payload).then((res) => {
                console.log(this.categories);
            })
            this.e1 = 2
        },
        GoToStep3() {
            this.e1 = 3
            this.form.category_arr.forEach(element => {
                this.form.category_new.push({
                    category: element,
                    quantity: 1,
                    size: '',
                })
            });
        }
    },
    created() {
        eventBus.$on('openSteppsEvent', data => {
            this.dialog = true
            this.getMenu()
        })
    },
    computed: {
        schools() {
            return this.$store.getters.schools
        },
        categories() {
            return this.$store.getters.categories
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

<style lang="scss" scoped>
</style>
