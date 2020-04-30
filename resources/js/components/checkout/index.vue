<template>
<v-app>
    <div style="padding: 30px 0">
        <VCard style="padding: 20px;width: 80%; margin: auto;box-shadow: 7px 7px 8px -4px rgb(210, 225, 246),0 12px 17px 2px rgb(210, 225, 246),0 5px 22px 4px rgb(210, 225, 246) !important;" v-if="user && user.is_client">
            <v-stepper v-model="e6" vertical>
                <v-stepper-step :complete="e6 > 1" step="1">User information</v-stepper-step>
                <v-stepper-content step="1" style="background: #fff;">
                    <v-card color="white lighten-1" class="mb-5">
                        <myAddress :user="user" :form="form"></myAddress>
                    </v-card>
                    <v-btn color="primary" @click="goToStep2">Continue</v-btn>
                </v-stepper-content>

                <v-stepper-step :complete="e6 > 2" step="2">Payment</v-stepper-step>
                <v-stepper-content step="2" style="background: #fff;">
                    <v-card color="white lighten-1" class="mb-5">
                        <myPayment :account="account"></myPayment>
                    </v-card>
                    <v-btn color="primary" @click="goToStep3">Continue</v-btn>
                    <v-btn text @click="e6 = 1">Back</v-btn>
                </v-stepper-content>

                <v-stepper-step :complete="e6 > 3" step="3">Complete</v-stepper-step>
                <v-stepper-content step="3" style="background: #fff;">
                    <v-card color="white lighten-1" class="mb-5">
                        <myComplete :account="account"></myComplete>
                    </v-card>
                    <!-- <v-btn color="primary" @click="finish">Finish</v-btn> -->
                    <v-btn text @click="e6 = 2">Back</v-btn>
                </v-stepper-content>
            </v-stepper>
        </VCard>
        <VCard style="padding: 20px;width: 80%; margin: auto;box-shadow: 7px 7px 8px -4px rgb(210, 225, 246),0 12px 17px 2px rgb(210, 225, 246),0 5px 22px 4px rgb(210, 225, 246) !important;" v-else-if="user && (user.is_admin || user && user.is_seller)">
            <div class="text-center">
                <p v-if="user.is_admin">You are logged in as an admin! Please logout and login as a client</p>
                <p v-if="user.is_seller">You are logged in as an vendor! Please logout and login as a client</p>

                <form action="/logout" method="post">
                    <input type="hidden" name="_token" :value="csrf" />
                    <!-- <input type="submit">Logout</v-btn> -->
                    <input type="submit" value="Signout" />
                </form>
            </div>
        </VCard>
        <VCard style="padding: 20px;width: 80%; margin: auto;box-shadow: 7px 7px 8px -4px rgb(210, 225, 246),0 12px 17px 2px rgb(210, 225, 246),0 5px 22px 4px rgb(210, 225, 246) !important;" v-else>
            <div class="text-center">
                <v-card-text>

                    <p>You are not logged! Please login or create an account</p>
                </v-card-text>
                <VCardActions style="margin-left: 40%">
                    <v-btn color="primary" href="/login">Login</v-btn>
                    <v-btn color="primary" href="/register">Signup</v-btn>
                </VCardActions>
            </div>
        </VCard>
    </div>
</v-app>
</template>

<script>
import myAddress from "./Address";
import myPayment from "./Payment";
import myComplete from "./Complete";
export default {
    props: ["user"],
    components: {
        myAddress,
        myComplete,
        myPayment
    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            account: [],
            e6: 1,
            errors: {},
            form: {}
        };
    },
    methods: {
        goToStep2() {
            if (this.user && this.user.is_client && this.user.shipping) {
                this.account = this.user;
            } else {
                this.account = this.form;
            }
            if (this.account == {}) {
                eventBus.$emit(
                    "errorEvent",
                    "Please confirm if all fields  with * are filled"
                );
                return;
            }
            this.e6 = 2;
            // axios.patch(`/address/${this.user.id}`, this.account).
            // then((response) => {})
            //     .catch((error) => {
            //         if (error.response.status === 500) {
            //             eventBus.$emit('errorEvent', error.response.statusText)
            //             return
            //         } else {
            //             eventBus.$emit('errorEvent', 'Please confirm if all fields  with * are filled')
            //             this.errors = error.response.data.errors
            //         }
            //         // console.log()
            //     })
        },
        goToStep3() {
            if (!this.account.payment) {
                eventBus.$emit(
                    "errorEvent",
                    "Please confirm if all fields  with * are filled"
                );
                return;
            }
            this.e6 = 3;
            //   eventBus.$emit("CompanyEvent");
        },
        cancel() {
            window.location.replace("/");
        },

        showerror(data) {
            this.message = data;
            this.Scolor = "red";
            this.snackbar = true;
        }
    },
    created() {
        eventBus.$on("userResponse", data => {
            window.location.replace("/thankyou");
        });
        eventBus.$on("companyResponse", data => {
            this.e6 = 2;
            // this.finish(data)
            this.company_id = data;
        });
        eventBus.$on("errorEvent", data => {
            this.showerror(data);
        });
    }
};
</script>
