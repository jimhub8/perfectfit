<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="800px">
        <v-card>
            <v-card-title>
                <span class="headline text-center" style="margin: auto;">Create Seller</span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container grid-list-md>
                    <v-layout row wrap>
                        <VCard>
                            <v-layout row wrap>
                                <v-flex sm6>
                                    <label for="">Vendor Name</label>
                                    <el-input placeholder="John Doe" v-model="form.name"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">Vendor Email</label>
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
        payload: {
            model: '/seller/sellers',
        },
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
        eventBus.$on("openCreateSeller", data => {
            this.dialog = true;
        });
    },

    methods: {
        save() {
            this.payload['data'] = this.form
            this.$store.dispatch('postItems', this.payload)
                .then(response => {
                    eventBus.$emit("sellerEvent")
                });
        },
        close() {
            this.dialog = false;
        }
    },
    computed: {
        suppliers() {
            return this.$store.dispatch('suppliers')
        },

        groups() {
            return this.$store.getters.groups;
        },
    },
};
</script>
