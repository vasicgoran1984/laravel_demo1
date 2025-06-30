<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <TransitionRoot as="template" :show="show">
        <Dialog as="div" class="relative z-10" @close="show = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                             leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-600 bg-opacity-70 transition-opacity"/>
            </TransitionChild>

            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300"
                                     enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                                     leave-from="opacity-100 translate-y-0 sm:scale-100"
                                     leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[700px] sm:w-full">
                            <Spinner v-if="loading"
                                     class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>
                            <header class="py-3 px-4 flex justify-between items-center">
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    {{ 'Novi Serviser' }}
                                </DialogTitle>
                                <button
                                    @click="closeModal()"
                                    class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
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
                                    <CustomInput class="mb-2" v-model="mechanic.first_name" :errors="errors['first_name']" label="Ime"/>
                                    <CustomInput class="mb-2" v-model="mechanic.last_name" :errors="errors['last_name']" label="Prezime"/>
                                    <CustomInput class="mb-2" v-model="mechanic.phone" label="Telefon"/>
                                </div>
                                <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="submit"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                        Snimi
                                    </button>
                                    <button type="button"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
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
import {computed, onUpdated, ref} from 'vue'
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from '@headlessui/vue'
import CustomInput from "../../components/core/CustomImput.vue";
import Spinner from "../../components/core/Spinner.vue";
import store from "../../store/index.js";

const loading = ref(false)
const errors = ref({});

const props = defineProps({
    modelValue: Boolean,
    mechanic: {
        required: true,
        type: Object,
    }
})

const mechanic = ref({
    first_name: props.mechanic.first_name,
    last_name: props.mechanic.last_name,
    phone: props.mechanic.phone
})

const emit = defineEmits(['update:modelValue', 'close'])

const show = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

onUpdated(() => {
    mechanic.value = {
        id: props.mechanic.id,
        first_name: props.mechanic.first_name,
        last_name: props.mechanic.last_name,
        phone: props.mechanic.phone
    }
})

function closeModal() {
    errors.value = '';
    show.value = false
    emit('close')
    emit('refresh');
}

function onSubmit() {
    loading.value = true

    if (mechanic.value.id) {
        // Edit Mechanic
        store.dispatch('mechanic/updateMechanic', mechanic.value)
            .then(response => {
                if (response.status === 200) {
                    store.commit('toast/showToast', `Serviser snimljen!`)
                    closeModal()
                    errors.value = '';
                    loading.value = false;
                }
            })
            .catch(({ response }) => {
                loading.value = false;
                // First Name
                if (response.data.errors.first_name) {
                    response.data.errors.first_name[0] = 'Ime je Obavezno polje!'
                } else {
                    response.data.errors.first_name = '';
                }
                // Last Name
                if (response.data.errors.last_name) {
                    response.data.errors.last_name[0] = 'Prezime je Obavezno polje!'
                } else {
                    response.data.errors.last_name = '';
                }
                errors.value = response.data.errors
            })
    } else {
        // Insert New Mechanic
        store.dispatch('mechanic/addNewMechanic', mechanic.value)
            .then(response => {
                if (response.status === 200) {
                    store.commit('toast/showToast', `Serviser snimljen!`)
                    closeModal()
                    errors.value = '';
                    loading.value = false;
                }
            })
            .catch(({ response }) => {
                loading.value = false;
                // First Name
                if (response.data.errors.first_name) {
                    response.data.errors.first_name[0] = 'Ime je Obavezno polje!'
                } else {
                    response.data.errors.first_name = '';
                }
                // Last Name
                if (response.data.errors.last_name) {
                    response.data.errors.last_name[0] = 'Prezime je Obavezno polje!'
                } else {
                    response.data.errors.last_name = '';
                }
                errors.value = response.data.errors
            })
    }




}
</script>
