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
    deletedUsers(state) {
        return state.deletedUsers
    },
    roles(state) {
        return _.orderBy(state.roles, 'name', 'asc')
    },
    permissions(state) {
        return state.permissions;
    },
    products(state) {
        return state.products
    },
    clients(state) {
        return state.clients
    },
    schools(state) {
        return state.schools
    },
    sellers(state) {
        return state.sellers
    },
    order_address(state) {
        return state.order_address
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
    drawers(state) {
        return state.drawers
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
    menu(state) {
        return state.menu;
    },
    subcategories(state) {
        return state.subcategories;
    },
    brands(state) {
        return state.brands;
    },
    currency(state) {
        return state.currency;
    },
    options(state) {
        return state.options;
    },
    option_values(state) {
        return state.option_values;
    },
    slider(state) {
        return state.slider;
    },
    slider_1(state) {
        return state.slider_1;
    },
    // Dashboard
    user_count(state) {
        return state.user_count
    },
    week_sales_count(state) {
        return state.week_sales_count
    },
    sellers_count(state) {
        return state.sellers_count
    },
    total_sales_count(state) {
        return state.total_sales_count
    },
    school_count(state) {
        return state.school_count
    },

    // Charts
    sales_chart(state) {
        return state.sales_chart
    },
    schools_chart(state) {
        return state.schools_chart
    },
    sellers_chart(state) {
        return state.sellers_chart
    },
}
