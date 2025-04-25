<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Customers</h1>
    </div>
    <CustomerModal v-model="showCustomerModal" :customer="customerModel" @close="onModalClose" />
    <CustomersTable @clickEdit="editCustomer" />
</template>


<script setup>

import {computed, ref} from "vue";
import store from "../../store/index.js";
import CustomersTable from "./CustomersTable.vue";
import CustomerModal from "./CustomerModal.vue";

const DEFAULT_CUSTOMER = {
    user_id: '',
    first_name: '',
    last_name: '',
    email: '',
    status: '',
    phone: '',
    created_at: '',
}

const customer = computed(() => store.state.customer.customers);
const customerModel = ref({...DEFAULT_CUSTOMER});
const showCustomerModal = ref(false);

function showAddNewModal() {
    showCustomerModal.value = true
}

function editCustomer(customer) {
    store.dispatch('customer/getCustomer', customer.id)
        .then(({data}) => {
            customerModel.value = data
            showAddNewModal()
        })
}

function onModalClose() {
    customerModel.value = {...DEFAULT_CUSTOMER}
}

</script>


<style scoped>

</style>
