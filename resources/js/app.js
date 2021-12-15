require('bootstrap')
const $ = require('jquery')

import Vue from 'vue'

Vue.component('billing-address-block', require('./front/Components/Account/Addresses/BillingAddressBlock').default);
Vue.component('billing-address-edit-form', require('./front/Components/Account/Addresses/BillingAddressEditForm').default);
Vue.component('billing-address-create-form', require('./front/Components/Account/Addresses/BillingAddressCreateForm').default);
Vue.component('billing-address-card', require('./front/Components/Account/Addresses/BillingAddressCard').default);

Vue.component('shipping-address-block', require('./front/Components/Account/Addresses/ShippingAddressBlock').default);
Vue.component('shipping-address-edit-form', require('./front/Components/Account/Addresses/ShippingAddressEditForm').default);
Vue.component('shipping-address-create-form', require('./front/Components/Account/Addresses/ShippingAddressCreateForm').default);
Vue.component('shipping-address-card', require('./front/Components/Account/Addresses/ShippingAddressCard').default);

Vue.component('update-account-form', require('./front/Components/Account/UpdateAccountForm').default);

Vue.component('cart-count', require('./front/Components/Cart/Counter').default);

const app = new Vue({
    el: '#app',
});
