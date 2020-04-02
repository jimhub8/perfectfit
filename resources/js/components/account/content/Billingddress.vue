<template>
<div>
    <v-layout wrap>
        <div v-if="user.billing != null">
            <v-layout row wrap>

                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="user.billing.name" color="blue darken-2" label="Full name" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="user.billing.email" color="blue darken-2" label="Email" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="user.billing.street_address" color="blue darken-2" label="Address" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="user.billing.town" color="blue darken-2" label="City/Town" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="user.billing.country" color="blue darken-2" label="Country" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="user.billing.county" color="blue darken-2" label="County" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="user.billing.phone" color="blue darken-2" label="Phone" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="user.billing.postal_code" color="blue darken-2" label="Zip/Postcode" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm2 offset-sm10>
                    <v-btn color="primary" @click="save('exists')">Submit</v-btn>
                </v-flex>
            </v-layout>

        </div>

        <div v-else>
            <v-layout row wrap>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="form.name" color="blue darken-2" label="Full name" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="form.email" color="blue darken-2" label="Email" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="form.street_address" color="blue darken-2" label="Address" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="form.town" color="blue darken-2" label="City/Town" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="form.country" color="blue darken-2" label="Country" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="form.county" color="blue darken-2" label="County" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="form.phone" color="blue darken-2" label="Phone" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm5 offset-sm1>
                    <v-text-field v-model="form.postal_code" color="blue darken-2" label="Zip/Postcode" required></v-text-field>
                </v-flex>
                <v-flex xs12 sm2 offset-sm10>
                    <v-btn color="primary" @click="save('doesnt')">Submit</v-btn>
                </v-flex>
            </v-layout>
        </div>
    </v-layout>
</div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            address: {},
            errors: {},
            form: {},
            loading: false,
        }
    },
    methods: {
        setPlace(place) {
            this.form.address = place;
        },
        save(data) {
            if (data == 'exists') {
                var payload = {
                    model: 'billing',
                    id: this.user.id,
                    data: this.user,
                }
            } else {
                var payload = {
                    model: 'billing',
                    id: this.user.id,
                    data: this.form,
                }

            }

            this.$store.dispatch('patchItems', payload)

        },
        mounted() {},
    }
}
</script>
