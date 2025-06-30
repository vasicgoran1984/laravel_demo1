<template>
    <div class="animate-fade-in-down z-9">
        <div class="bg-white px-4 pt-5 pb-4 py-2">
            <h1 class="text-2xl font-semibold pb-2">{{ title }}</h1>
            <h2><b>Ime: </b>{{user.first_name}}</h2>
            <h2><b>Prezime: </b>{{user.last_name}}</h2>
            <h2 class="pb-4"><b>Email: </b>{{user.email}}</h2>
        </div>

        <div class="bg-white px-4 pt-5 pb-4 py-2 mt-2">
            <h1 class="text-2xl font-semibold pb-2">{{ service_title }}</h1>
            <form @submit.prevent="onSubmit">
                <div class="bg-white px-4 pt-5 pb-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <CustomInput class="mb-2" v-model="service.name_service" label="Naziv" />
                        <CustomInput class="mb-2" v-model="service.city" label="Grad"/>
                        <CustomInput class="mb-2" v-model="service.address" label="Adresa"/>
                        <CustomInput class="mb-2" v-model="service.phone" label="Telefon"/>
                    </div>
                </div>

                <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Snimi
                    </button>
                    <router-link :to="{name: 'app.dashboard'}" type="button"
                                 class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                 ref="cancelButtonRef">
                        Nazad
                    </router-link>
                </footer>
            </form>
        </div>
        <div class="bg-white px-4 pt-5 pb-4 py-2 mt-2">

            <div class="flex items-center justify-between mb-3">
                <h1 class="text-2xl font-semibold pb-2">{{ mechanic_title }}</h1>
                <button type="button"
                        @click="showAddNewModal()"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                >
                    Novi Serviser
                </button>
            </div>
        </div>
        <MechanicModal v-model="showMechanicModal" :mechanic="mechanicModel" @close="onModalClose"/>
        <MechanicTable ref="mechanicTable" @clickEdit="editMechanic" />
    </div>
</template>

<script setup>


import {onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute, useRouter} from "vue-router";
import CustomInput from "../../components/core/CustomImput.vue";
import MechanicModal from "../Mechanic/MechanicModal.vue";
import MechanicTable from "../Mechanic/MechanicTable.vue";

const router = useRouter();
const route = useRoute()

const title = ref('');
const service_title = ref('');
const mechanic_title = ref('');
const loading = ref(false);
const user = store.state.user.user.data;

const mechanicTable = ref(null);

const DEFAULT_MECHANIC = {
    id: '',
    first_name: '',
    last_name: '',
    phone: ''
}

const service = ref({
    id: '',
    name_service: '',
    city: '',
    address: '',
    phone: '',
});

const mechanicModel = ref({...DEFAULT_MECHANIC})

const showMechanicModal = ref(false);
function showAddNewModal() {
    showMechanicModal.value = true
}

function onSubmit() {
    loading.value = true;

    if (service.value.id) {
        store.dispatch('service/updateService', service.value)
            .then(response => {
                if (response.status === 200) {
                    store.commit('toast/showToast', `Servis Izmijenjen!`)
                    store.dispatch('service/getServiceByServiceId', service.value.id)
                }
            })
            .catch(err => {
                console.log(err)
            })

    } else {
        store.dispatch('service/createService', service.value)
            .then(response => {
                service.value = response.data
                store.commit('toast/showToast', `Servis Kreiran!`)
                store.dispatch('service/getServiceByServiceId', response.data.id)
            })
            .catch(err => {
                console.log(err)
            })
    }

}

onMounted(() => {
    store.dispatch('service/getService', user.id)
        .then(({data}) => {
            store.dispatch('service/getServiceByServiceId', data.id)
            if (data) {
                service.value = data;
            }
        })

    title.value = "Vlasnik Servisa";
    service_title.value = "Podaci Servisa";
    mechanic_title.value = "Serviseri";
})

function onModalClose() {
    mechanicModel.value = {...DEFAULT_MECHANIC}
    if (mechanicTable.value) {
        mechanicTable.value.refreshMechanics();
    }
}

// Edit Mechanic

function editMechanic(mechanic) {
    store.dispatch('mechanic/getMechanic', mechanic)
        .then(({data}) => {
            mechanicModel.value = data
            showAddNewModal();
        })
}

</script>

<style scoped>

</style>
