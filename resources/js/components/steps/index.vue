<template>
<v-app>
    <el-dialog title="Warning" :visible.sync="dialog" width="60%" center :close-on-click-modal="false">
        <v-stepper v-model="e1">
            <v-stepper-header>
                <v-stepper-step :complete="e1 > 1" step="1">Name of step 1</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step :complete="e1 > 2" step="2">Name of step 2</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step step="3">Name of step 3</v-stepper-step>
            </v-stepper-header>
            <v-stepper-items>
                <v-stepper-content step="1">
                    <v-card class="mb-5" color="white lighten-1">
                        <div>
                            <label for="">School</label>
                            <el-select v-model="form.school" filterable remote reserve-keyword placeholder="Please enter a keyword" :remote-method="schoolSearch" :loading="loading" style="width: 100%" value-key="id">
                                <el-option v-for="item in schools.data" :key="item.id" :label="item.name" :value="item">
                                </el-option>
                            </el-select>
                        </div>
                        <div style="margin: 20px 0;"></div>
                        <div>
                            <label for="">Category</label>
                            <el-select v-model="form.menus" multiple filterable remote reserve-keyword placeholder="Please enter a keyword" :remote-method="categorySearch" :loading="loading" style="width: 100%" value-key="id">
                                <el-option v-for="item in form.school.menus" :key="item.id" :label="item.menu" :value="item">
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
                    </v-card>
                    <v-btn color="primary" @click="e1 = 2">
                        Continue
                    </v-btn>
                    <v-btn text>Cancel</v-btn>
                </v-stepper-content>
                <v-stepper-content step="2">
                    <v-card class="mb-5" color="white lighten-1">
                        <label for="">Size</label>
                        <el-input placeholder="Please input" v-model="form.size"></el-input>

                        <div style="margin: 20px 0;"></div>
                        <youtube :video-id="videoId"></youtube>

                    </v-card>
                    <v-btn color="primary" @click="e1 = 3">
                        Continue
                    </v-btn>
                    <v-btn text @click="e1 = 1">Back</v-btn>
                </v-stepper-content>
                <v-stepper-content step="3">
                    <v-card class="mb-5" color="white lighten-1" v-if="e1 == 3">
                        <ul class="list-group">
                            <li class="list-group-item active">School <label for="" style="float: right">{{ form.school.name }}</label></li>
                            <li class="list-group-item">Categories
                                <label for="" style="float: right" v-for="category in form.menus" :key="category.id">{{ category.menu }}, </label>
                            </li>
                            <li class="list-group-item">Size <label for="" style="float: right">{{ form.size }}</label></li>
                        </ul>
                    </v-card>
                    <v-btn color="primary" @click="filterItems">
                        Finish
                    </v-btn>
                    <v-btn text @click="e1 = 2">Cancel</v-btn>
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
export default {
    data() {
        return {
            dialog: false,
            e1: 1,
            form: {
                school: [],
                menus: [],
            },
            videoId: "https://www.youtube.com/watch?v=mSx-dRURkKc&list=RDJPbXGIm7dqY&index=11"
        }
    },
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

        filterItems() {
            this.$router.push({
                name: "shop",
                params: {
                    data: this.form
                }
            });
            this.dialog = false


            // alert('oooo')
            // this.$router.push({
            //     name: "details",
            //     params: {
            //         id: proId
            //     }
            // });
        }
    },
    created() {
        eventBus.$on('openSteppsEvent', data => {
            this.dialog = true
        })
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

<style lang="scss" scoped>
</style>
