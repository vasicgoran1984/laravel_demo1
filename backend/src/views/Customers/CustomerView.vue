<template>
    <div v-if="customer.id" class="animate-fade-in-down">
        <form @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <h1 class="text-1xl font-semibold pb-2">{{ title }}</h1>
                <CustomInput class="mb-2" v-model="customer.first_name" label="Name" />
                <CustomInput class="mb-2" v-model="customer.last_name" label="Last Name"/>
                <CustomInput class="mb-2" v-model="customer.email" label="Email"/>
                <CustomInput class="mb-2" v-model="customer.phone" label="Phone"/>
                <CustomInput type="checkbox" class="mb-2" v-model="customer.status" label="Active"/>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">

                    <div>
                        <h2 class="text-2xl font-semibold mt-6 pb-2 border-b border-gray-300">
                            Billing Address
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <CustomInput v-model="customer.billingAddress.address1" label="Address 1"/>
                            <CustomInput v-model="customer.billingAddress.address2" label="Address 2"/>
                            <CustomInput v-model="customer.billingAddress.city" label="City"/>
                            <CustomInput v-model="customer.billingAddress.zipcode" label="Zip Code"/>
                            <CustomInput type="select" :select-options="countries" v-model="customer.billingAddress.country_code" label="Country"/>
                            <CustomInput v-if="!billingCountry.states" v-model="customer.billingAddress.state" label="State"/>
                            <CustomInput v-else type="select" :select-options="billingStateOptions" v-model="customer.billingAddress.state" label="State"/>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-2xl font-semibold mt-6 pb-2 border-b border-gray-300">
                            Shipping Address
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <CustomInput v-model="customer.shippingAddress.address1" label="Address 1"/>
                            <CustomInput v-model="customer.shippingAddress.address2" label="Address 2"/>
                            <CustomInput v-model="customer.shippingAddress.city" label="City"/>
                            <CustomInput v-model="customer.shippingAddress.zipcode" label="Zip Code"/>
                            <CustomInput type="select" :select-options="countries" v-model="customer.shippingAddress.country_code" label="Country"/>
                            <CustomInput v-if="!shippingCountry.states" v-model="customer.shippingAddress.state" label="State"/>
                            <CustomInput v-else type="select" :select-options="shippingStateOptions" v-model="customer.shippingAddress.state" label="State"/>
                        </div>
                    </div>

                </div>
            </div>

            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Submit
                </button>
                <router-link :to="{name: 'app.customers'}" type="button"
                             class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                             ref="cancelButtonRef">
                    Cancel
                </router-link>
            </footer>

        </form>
    </div>
</template>

<script setup>


import {computed, onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute, useRouter} from "vue-router";
import CustomInput from "../../components/core/CustomImput.vue";

const router = useRouter();
const route = useRoute()

const title = ref('');
const customer = ref({
    billingAddress: {},
    shippingAddress: {},
});

const loading = ref(false);

const countries = computed(() => store.state.country.countries.map(c => ({key: c.code, text: c.name})))

const billingCountry = computed(() => store.state.country.countries.find(c => c.code === customer.value.billingAddress.country_code))

const billingStateOptions = computed(() => {
    if (!billingCountry.value || !billingCountry.value.states) return [];

    return Object.entries(billingCountry.value.states).map(c => ({key: c[0], text: c[1]}))
})
const shippingCountry = computed(() => store.state.country.countries.find(c => c.code === customer.value.shippingAddress.country_code))
const shippingStateOptions = computed(() => {
    if (!shippingCountry.value || !shippingCountry.value.states) return [];

    return Object.entries(shippingCountry.value.states).map(c => ({key: c[0], text: c[1]}))
})

function onSubmit() {
    loading.value = true;

    if (customer.value.id) {
        customer.value.status = !!customer.value.status
        store.dispatch('customer/updateCustomer', customer.value)
            .then(response => {
                loading.value = false
                if (response.status === 200) {
                    // Show notify
                    store.dispatch('customer/getCustomer', customer.value.id)
                    router.push({name: 'app.customers'})
                }
            })
            .catch(err => {
                console.log(err)
            })
    } else {
        store.dispatch('customer/createCustomer', customer.value)
            .then(response => {
                loading.value = false
                if (response.status === 201) {
                    store.dispatch('customer/getCustomer')
                    router.push({name: 'app.customers'})
                }
            })
            .catch(err => {
                loading.value = false;
            })
    }
}

onMounted(() => {
    store.dispatch('customer/getCustomer', route.params.id)
        .then(({data}) => {
            title.value = `Update customer: "${data.first_name} ${data.last_name}"`;
            customer.value = data
        })

})

</script>


<style scoped>

</style>
