export default {
    loading(state) {
        return state.loading;
    },
    errors(state) {
        return state.errors;
    },
    alertEvent(state) {
        eventBus.$emit('alertEvent', state)
        // return state.alertEvent;
    },
    users(state) {
        return state.users
    },
    roles(state) {
        return _.orderBy(state.roles, 'name', 'asc')
    },
    products(state) {
        return state.products
    },
    menu(state) {
        return state.menu
    },
    schools(state) {
        return state.schools
    },
    customers(state) {
        return state.customers
    },
    discount(state) {
        return state.discount
    },
    sales(state) {
        return state.sales
    },
    groups(state) {
        return state.groups
    },
    categories(state) {
        return state.categories
    },

    discounts(state) {
        return state.discounts
    },
    // Unique
    unique_sku(state) {
        return state.unique_sku;
    },
    categories(state) {
        return state.categories;
    },
    brands(state) {
        return state.brands;
    },


    options(state) {
        return state.options;
    },
    option_values(state) {
        return state.option_values;
    },


    cart_total(state) {
        return state.cart_total;
    },
    carts(state) {
        return state.carts
    },
    cart_count(state) {
        return state.cart_count
    },
}
