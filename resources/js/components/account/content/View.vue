<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="700px">
        <v-card v-if="dialog">
            <v-card-title fixed>
                <v-spacer></v-spacer>
                <v-btn icon dark @click="close">
                    <v-icon color="black">close</v-icon>
                </v-btn>
            </v-card-title>

            <div class="card">
                <div class="card-header">
                    <ul class="list-group text-center">
                        <!-- <li class="list-group-item active">{{ order.buyer_name }}'s' Orders</li> -->
                    </ul>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order No.</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in order.products" :key="product.id" >
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ order.order_no }}</td>
                                <td>{{ product.product_name }}</td>
                                <td class="badge" style="color: #fff; background: #f00;">{{ product.pivot.price }}</td>

                                <!-- <td>{{ carts.list_price }}</td> -->
                                <td>{{ carts.created_at }}</td>
                                <!-- <td>{{ cart.status }}</td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <v-card-actions>
                <v-btn text @click="close">Close</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</v-layout>
</template>

<script>
export default {
    data() {
        return {
            dialog: false,
            carts: [],
            order: [],
            totalPrice: '',
            discount: 0,
        };
    },
    methods: {
        close() {
            // eventBus.$emit("closeRequest", product);
            this.dialog = false;
        }
    },
    created() {
        eventBus.$on("viewOrdEvent", data => {
            this.order = data;
            this.carts = data;
            this.dialog = true;
        });
    },

    computed: {
        getSubTotal() {
            // if (this.carts.length > 0) {
            //     this.totalPrice = 0;
            //     for (let index = 0; index < this.carts.length; index++) {
            //         const element = this.carts[index];
            //         this.totalPrice = parseInt(element.price) + this.totalPrice;
            //     }
            // }
            return this.totalPrice;
        },
        getTotal() {
            // if (this.carts.length > 0) {
            //     return parseInt(this.getSubTotal) - this.discount;
            // }
        }
    },
};
</script>

<style scoped>
.badge,
.badge-danger,
.badge-dark,
.badge-default,
.badge-info,
.badge-primary,
.badge-secondary,
.badge-success,
.badge-warning {
    font-size: 12px !important;
}
</style>
