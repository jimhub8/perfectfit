export default {
    loading(state, payload) {
        state.loading = payload
    },
    errors(state, payload) {
        state.errors = payload
    },
    alertEvent(state, payload) {
        state.alertEvent = payload
    },
    updateUsersList(state, payload) {
        state.users = payload
    },
    updateRoleList(state, payload) {
        state.roles = payload
    },
    updateProductsList(state, payload) {
        state.products = payload
    },
    updateSchoolList(state, payload) {
        state.schools = payload
    },
    updateClientList(state, payload) {
        state.clients = payload
    },
    updateSaleList(state, payload) {
        state.sales = payload
    },
    // Unique
    updateunique_sku(state, payload) {
        state.unique_sku = payload
    },
    updateunique_inv(state, payload) {
        state.unique_inv = payload
    },
    updateunique_pkg(state, payload) {
        state.unique_pkg = payload
    },

    updateDiscountList(state, payload) {
        state.discounts = payload
    },
    updateGroupList(state, payload) {
        state.groups = payload
    },
    updateCategoryList(state, payload) {
        state.categories = payload
    },

    updateBrandList(state, payload) {
        state.brands = payload
    },

    // Deleted
    updateDeletedClients(state, payload) {
        state.deleted_clients = payload
    },

    updateOptionsList(state, payload) {
        state.options = payload
    },
    updateOptionValuesList(state, payload) {
        state.option_values = payload
    },
    updateMenuList(state, payload) {
        state.menu = payload
    },


    updateCartsList(state, payload) {
        state.carts = payload
    },
    updateCartCountList(state, payload) {
        state.cart_count = payload
    },
    updateCartTotalList(state, payload) {
        state.cart_total = payload
    },

    updateCartList(state, payload) {
        state.cart = payload

        var exists = state.cart.some(function (product_1) {
            return product_1.id === payload.id
        });
        if (!exists) {
            payload.ordered = 1
            state.cart.push(payload)
        } else {
            var index = state.cart.indexOf(payload);
            var add_item = (Object.assign({}, payload));
            add_item.ordered += 1
            // console.log(add_item);
            Object.assign(state.cart[index], add_item)
        }
        state.cart = state.cart
    },
}
