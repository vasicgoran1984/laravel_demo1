<template>
    <TransitionRoot appear :show="show" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black/50" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white text-left align-middle shadow-xl transition-all"
                        >
                            <Spinner v-if="loading"
                                     class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

                            <header class="py-3 px-4 flex justify-between items-center">
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    {{ customer.id ? `Update customer: "${props.customer.first_name} ${props.customer.last_name}"` : 'Create new Customer' }}
                                </DialogTitle>
                                <button
                                    @click="closeModal"
                                    class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-6 w-6"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </button>
                            </header>
                            <form @submit.prevent="onSubmit">
                                <div class="bg-white px-4 pt-5 pb-4">
                                    <CustomInput class="mb-2" v-model="customer.first_name" label="Name"/>
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

                                                <!--                          <pre>{{ billingCountry }}</pre>-->
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
                                    <button type="button"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                            @click="closeModal" ref="cancelButtonRef">
                                        Cancel
                                    </button>
                                </footer>
                            </form>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import {computed, onMounted, onUpdated, ref} from 'vue'
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'
import Spinner from "../../components/core/Spinner.vue";
import store from "../../store/index";
import CustomInput from "../../components/core/CustomImput.vue";
const loading = ref(false);

const props = defineProps({
    modelValue: Boolean,
    customer: {
        required: true,
        type: Object,
    }
})

const customer = ref({
    billingAddress: {},
    shippingAddress: {},
});

const emit = defineEmits(['update:modelValue'])

const show = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

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

onUpdated(() => {
    customer.value = {
        id: props.customer.id,
        first_name: props.customer.first_name,
        last_name: props.customer.last_name,
        email: props.customer.email,
        status: props.customer.status,
        phone: props.customer.phone,
        billingAddress: {
            ...props.customer.billingAddress
        },
        shippingAddress: {
            ...props.customer.shippingAddress
        },
    }
})

function closeModal() {
    show.value = false
    emit('close')
}

function onSubmit() {
    loading.value = true;

    if (customer.value.id) {
        console.log(customer.value.status)
        customer.value.status = !!customer.value.status
        store.dispatch('customer/updateCustomer', customer.value)
            .then(response => {
                loading.value = false
                if (response.status === 200) {
                    // Show notify
                    store.dispatch('country/getCountries')
                    closeModal()
                }
            })
            .catch(err => {
                console.log(err)
            })
    } else {
        store.dispatch('createCustomer', customer.value)
            .then(response => {
                loading.value = false
                if (response.status === 201) {
                    store.dispatch('country/getCountries')
                    closeModal()
                }
            })
            .catch(err => {
                loading.value = false;
            })
    }

}

</script>


<style scoped>

</style>
