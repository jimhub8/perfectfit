<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="700px">
        <v-card>
            <v-card-title>
                <span class="headline text-center" style="margin: auto;">Edit School</span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container grid-list-md>
                    <v-layout row wrap>
                        <VCard>
                            <v-flex sm12>
                                <v-card-text>
                                    <v-layout row wrap>
                                        <v-flex sm6>
                                            <label for="">School Name</label>
                                            <el-input placeholder="John Doe" v-model="form.name"></el-input>
                                        </v-flex>
                                        <v-flex sm6>
                                            <label for="">School Email</label>
                                            <el-input placeholder="john@gmail.com" v-model="form.email"></el-input>
                                        </v-flex>
                                        <v-flex sm6>
                                            <label for="">Phone Number</label>
                                            <el-input placeholder="+254..." v-model="form.phone"></el-input>
                                        </v-flex>
                                        <v-flex sm6>
                                            <label for="">County</label>
                                            <el-input placeholder="Nairobi" v-model="form.county"></el-input>
                                        </v-flex>
                                        <v-flex sm6>
                                            <label for="">Town</label>
                                            <el-input placeholder="Nairobi" v-model="form.town"></el-input>
                                        </v-flex>
                                        <v-flex sm6>
                                            <label for="">Gender</label>
                                            <el-select v-model="form.gender" filterable clearable placeholder="Gender" style="width: 100%;">
                                                <el-option v-for="item in gender" :key="item.value" :label="item.label" :value="item.value">
                                                </el-option>
                                            </el-select>
                                        </v-flex>
                                    </v-layout>

                                    <v-divider></v-divider>

                                    <h2>Contact person</h2>
                                    <v-layout row wrap>
                                        <v-flex sm6>
                                            <label for="">Name</label>
                                            <el-input placeholder="John Doe" v-model="form.contact_person"></el-input>
                                        </v-flex>
                                        <v-flex sm6>
                                            <label for="">Phone</label>
                                            <el-input placeholder="+254..." v-model="form.contact_phone"></el-input>
                                        </v-flex>
                                        <v-flex sm6>
                                            <label for="">Email</label>
                                            <el-input placeholder="john@doe.com" v-model="form.contact_email"></el-input>
                                        </v-flex>
                                    </v-layout>
                                    <v-divider></v-divider>
                                    <v-layout row wrap>
                                        <v-flex xs12 style="padding: 7px 10px 20px 10px;">
                                            <label for="" style="color: #52627d;">Category</label>
                                            <el-select v-model="form.menus" multiple filterable clearable placeholder="Select Category" style="width:100%;">
                                                <el-option v-for="item in menus.data" :key="item.id" :label="item.menu" :value="item.id">
                                                </el-option>
                                            </el-select>
                                        </v-flex>
                                    </v-layout>
                                </v-card-text>
                            </v-flex>
                        </VCard>
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
    data: () => ({
        dialog: false,
        loading: false,
        form: {},
        errors: {},
        gender: [{
                value: 'Male',
                lable: 'Male',
            },
            {
                value: 'Female',
                lable: 'Female',
            },
        ]
    }),
    created() {
        eventBus.$on("openEditSchool", data => {
            this.form = data
            this.dialog = true;
        });
    },

    methods: {
        save() {

            var payload = {
                model: '/school/schools',
                data: this.form,
                id: this.form.id
            }
            this.$store.dispatch('patchItems', payload)
                .then(response => {
                    eventBus.$emit("schoolEvent")
                });
        },
        close() {
            this.dialog = false;
        }
    },
    computed: {
        menus() {
            return this.$store.getters.menu;
        },
    },
};
</script>
