<template>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
        <h1 class="text-3xl font-semibold">Servis Vozila</h1>
        <div @click="showSmallService" class="animate-fade-in-down bg-blue-600 shadow" style="animation-delay: 0.1s">
            <h1 class="text-2xl font-semibold pb-2 pt-2 text-center text-white cursor-pointer">{{smallSTitle}}</h1>
        </div>
        <div @click="showBigService" class="animate-fade-in-down bg-orange-600 shadow" style="animation-delay: 0.1s">
            <h1 class="text-2xl font-semibold pb-2 pt-2 text-center text-white cursor-pointer">{{bigSTitle}}</h1>
        </div>
        <div @click="showBrakeService" class="animate-fade-in-down bg-green-600 shadow" style="animation-delay: 0.1s">
            <h1 class="text-2xl font-semibold pb-2 pt-2 text-center text-white cursor-pointer">{{ brakeSTitle }}</h1>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
        <div class="animate-fade-in-down bg-white shadow flex flex-col" style="animation-delay: 0.1s">
            <div v-if="!loadingOwner" class="bg-white px-4 pt-5 pb-4">
                <h1 class="text-2xl font-semibold pb-2">{{ ownerTitle }}</h1>
                <hr class="mb-2"/>
                <h2 class="text-[20px]"><b>Ime: </b>{{bookService.first_name}}</h2>
                <h2 class="text-[20px]"><b>Prezime: </b>{{bookService.last_name}}</h2>
                <h2 class="text-[20px]"><b>Grad: </b>{{bookService.city}}</h2>
                <h2 class="text-[20px]"><b>Telefon: </b>{{bookService.phone}}</h2>
            </div>
            <div v-else class="bg-white px-4 pt-5 pb-4 py-2">
                <Spinner class="my-4" />
            </div>
        </div>

        <div class="animate-fade-in-down bg-white rounded-lg shadow flex flex-col" style="animation-delay: 0.1s">
            <div v-if="!loadingOwner" class="bg-white px-4 pt-5 pb-4 py-2">
                <h1 class="text-2xl font-semibold pb-2">{{ carTitle }}</h1>
                <hr class="mb-2"/>
                <h2 class="text-[20px]"><b>Proizvodjač: </b>{{bookService.producer_name}}</h2>
                <h2 class="text-[20px]"><b>Model: </b>{{bookService.type_name}}</h2>
                <h2 class="text-[20px]"><b>Broj Šasije: </b>{{bookService.chassis_number}}</h2>
                <h2 class="text-[20px]"><b>Broj Tablica: </b>{{bookService.plate_number}}</h2>
            </div>
            <div v-else class="bg-white px-4 pt-5 pb-4 py-2">
                <Spinner class="my-4" />
            </div>
        </div>
    </div>

    <div class="bg-white px-4 pt-5 pb-4 py-2 mt-2">
        <div v-if="loading" class="bg-white px-4 pt-5 pb-4 py-2">
            <Spinner class="my-4" />
        </div>
        <div v-else>
            <form @submit.prevent="onSubmit">

                <div class="top-16 w-72 pb-8">
                    <label class="ml-2 text-gray-600">Serviser</label>
                    <Combobox v-model:modValue="selectedMechanic" :items="mechanics" :errors="errors['mechanic_id']" />
                </div>

                <div v-if="smallService">
                    <h1 class="text-2xl bg-blue-500 font-semibold pb-2 pt-2 text-white pl-3">{{ smallSTitle }}</h1>
                    <div class="bg-white px-4 pt-5 pb-4">
                        <div class="grid grid-cols-1 md:grid-cols-6 gap-2">
                            <CustomInput class="mb-2" v-model="carService.oil_name" label="Naziv Ulja" />
                            <CustomInput id="oil_filter" type="checkbox" name="oil_filter" class="mb-2" v-model="carService.oil_filter" label="Filter Ulja"/>
                            <CustomInput type="checkbox" name="air_filter" class="mb-2" v-model="carService.air_filter" label="Filter Vazduha"/>
                            <CustomInput id="inner_filter" type="checkbox" name="inner_filter" class="mb-2" v-model="carService.inner_filter" label="Filter Kabine"/>
                            <CustomInput type="checkbox" name="fule_filter" class="mb-2" v-model="carService.fuel_filter"  label="Filter Goriva"/>
                        </div>
                    </div>
                </div>
                <div v-if="bigService">
                    <h1 class="text-2xl bg-orange-500 font-semibold pb-2 pt-2 text-white pl-3">{{ bigSTitle }}</h1>
                    <div class="bg-white px-4 pt-5 pb-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.belt" label="Zupčasti Kaiš"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.water_pump" label="Vodena Pumpa"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.spanner" label="Španer"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.roll" label="Španer Rolna"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.outside_belt" label="Trakasti Remen"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.outside_spanner" label="Španer Trakastog Remena"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.alt_pulley" label="Španer Alternatora"/>
                        </div>
                    </div>
                </div>
                <div v-if="brakeService">
                    <h1 class="text-2xl bg-green-500 font-semibold pb-2  pt-2 text-white pl-3">{{ brakeSTitle }}</h1>
                    <div class="bg-white px-4 pt-5 pb-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.brake_pads_front" label="Prednje Plocice"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.disc_front" label="Prednji Diskovi"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.front_left_cylinder" label="Prednja Lijeva Klijesta"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.front_right_cylinder" label="Prednja Desna Klijesta"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.brake_pads_rear" label="Zadnje Plocice"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.disc_rear" label="Zadnji Diskovi"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.rear_left_cylinder" label="Zadnja Lijeva Klijesta"/>
                            <CustomInput type="checkbox" class="mb-2" v-model="carService.rear_right_cylinder" label="Zadnja Desna Klijesta"/>
                        </div>
                    </div>
                </div>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-400">
                <CustomInput type="textarea" class="mb-2" v-model="carService.description" label="Napomena..."/>
                <div class="bg-white px-4 pt-5 pb-4 mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                        <CustomInput class="mb-2 text-gray-700" v-model="carService.kilometers" :errors="errors['kilometers']" label="Unesite Kilometre...." />
                        <CustomInput :disabled="true" v-model="currentDate.value" class="mb-2 text-gray-700 border-b-lg" label="Datum" />
                        <CustomInput class="mb-2 text-gray-700" v-model="carService.price" :errors="errors['price']" label="Unesite Cijenu" />

                        <button class="h-10 mt-1 text-lg text-white transition-colors duration-150 bg-gray-500 rounded-lg focus:shadow-outline hover:bg-gray-800">
                            Snimi
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</template>


<script setup>

import {onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute} from "vue-router";
import Spinner from "../../components/core/Spinner.vue";
import CustomInput from "../../components/core/CustomImput.vue";
import router from "../../router/index.js";
import Combobox from "./Combobox.vue";

const carTitle = ref('');
const smallSTitle = ref('');
const bigSTitle = ref('');
const brakeSTitle = ref('');
const ownerTitle = ref('');
const loadingOwner = ref(true);
const loading = ref(true);
const bookService = ref({});
const smallService = ref(true);
const bigService = ref(false);
const brakeService = ref(false);

const currentDate = ref('');
const route = useRoute();
const errors = ref({});
const carService = ref({});
const mechanics = ref([]);
const selectedMechanic = ref(null);


onMounted(() => {
    const service = route.params.service
    carService.value.mechanic_id = selectedMechanic.value?.id ?? null;

    store.dispatch('bookService/getCarServiceById', service)
        .then(({data}) => {
            bookService.value = data.bookService;
            carService.value = data.carService;
            loadingOwner.value = false;
        })

    store.dispatch('mechanic/getAllMechanics')
        .then(({ data }) => {
            mechanics.value = data;
            const mechanicId = carService.value.mechanic_id;
            selectedMechanic.value = data.find(m => m.id === mechanicId);
            loading.value = false;
    });
    // Titles
    ownerTitle.value = "Vlasnik";
    carTitle.value = "Vozilo";
    smallSTitle.value = 'Mali Servis';
    bigSTitle.value = 'Veliki Servis';
    brakeSTitle.value = 'Kočnice';

    // Get Current Date
    currentDate.value = ref(new Date().toLocaleString(
        "en-GB",
        {year: 'numeric', month: 'numeric', day: 'numeric', hour: '2-digit', minute: '2-digit'}
    ));
})

// Show Small Service
function showSmallService() {
    smallService.value = true;
    bigService.value = false;
    brakeService.value = false;
}

// Show Big Service
function showBigService() {
    smallService.value = false;
    bigService.value = true;
    brakeService.value = false;
}

// Show Brake Service
function showBrakeService() {
    smallService.value = false;
    bigService.value = false;
    brakeService.value = true;
}


function onSubmit() {

    carService.value.mechanic_id = selectedMechanic.value?.id ?? null;

    store.dispatch('carService/updateCarService', carService.value)
        .then(response => {
            store.commit('toast/showToast', `Servis Vozila Izmijenjen!`)
            router.push({name: 'app.bookService'})
        })
        .catch(({ response }) => {
            // Kilometers
            if (response.data.errors.kilometers) {
                response.data.errors.kilometers[0] = 'Kilometri su Obavezno polje!'
            } else {
                response.data.errors.kilometers = '';
            }
            // Price
            if (response.data.errors.price) {
                response.data.errors.price[0] = 'Cijena je Obavezno polje!'
            } else {
                response.data.errors.price = '';
            }
            errors.value = response.data.errors
        })
}

</script>


<style scoped>

</style>
