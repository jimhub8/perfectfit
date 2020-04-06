import actions from './actions';
import getters from './getters';
import mutations from './mutations';

export default {
    state: {
        loading: false,
        errors: [],
        users: [],
        deletedUsers: [],
        roles: [],
        permissions: [],
        products: [],
        schools: [],
        sellers: [],
        discount: [],
        sales: [],
        order_address: [],
        drawers: [],
        discounts: [],
        clients: [],
        suppliers: [],
        categories: [],
        menu: [],
        subcategories: [],
        brands: [],
        unique_sku: null,
        option_values: [],
        currency: [],
        // Deleted
        deleted_clients: [],

        // Api
        options: [],
        slider_1: [],
        slider: [],
        cart: [],

        // Dashboard
        user_count: null,
        week_sales_count: null,
        sellers_count: null,
        total_sales_count: null,
        school_count: null,

        // Charts
        schools_chart: null,
        sellers_chart: null,
        sales_chart: [],

    },
    getters,
    mutations,
    actions
}
