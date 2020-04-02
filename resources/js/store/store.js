import actions from './actions';
import getters from './getters';
import mutations from './mutations';

export default {
    state: {
        loading: false,
        errors: [],
        users: [],
        roles: [],
        products: [],
        customers: [],
        discount: [],
        sales: [],
        groups: [],
        categories: [],
        discounts: [],
        clients: [],
        schools: [],
        menu: [],
        brands: [],
        unique_sku: null,
        option_values: [],

        // Deleted
        deleted_clients: [],

        // Api
        options: [],


        carts: [],
        cart_count: null,
        cart_total: null,
        cart: [],


    },
    getters,
    mutations,
    actions
}
