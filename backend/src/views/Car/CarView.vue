<template>
    <div class="bg-white mb-6 rounded-lg">
        <a @click="$router.go(-1)" class="py-4 flex items-center rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-500">
                <span class="text-3xl">
                    Nazad
              </span>
        </a>
    </div>

    <div class="animate-fade-in-down z-9">
        <div class="bg-white px-4 pt-5 pb-4 py-2 mt-2">
            <h1 class="text-2xl font-semibold pb-2">Unesi Vozilo</h1>
            <form @submit.prevent="onSubmit">
                <div class="bg-white px-4 pt-5 pb-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <CustomInput class="mb-2" disabled v-model="producer" />
                        <CustomInput class="mb-2" disabled v-model="type" />
                        <CustomInput class="mb-2" hidden v-model="car.type_id" />
                        <CustomInput class="mb-2" v-model="car.chassis_number" :errors="errors['chassis_number']" label="Broj Šasije" />
                        <CustomInput class="mb-2" v-model="car.engine_number" :errors="errors['engine_number']" label="Broj Motora"/>
                        <CustomInput class="mb-2" v-model="car.plate_number" label="Broj Tablica"/>
<!--                        <CustomInput class="mb-2" v-model="car.volume" label="Zapremina Motora"/>-->

                        <div class="mt-1">
                            <select class="items-center text-gray-500 text-sm block rounded-md w-full bg-white px-3 py-2 border border-gray-300 focus:z-10 sm:text-sm"
                                    v-model="car.volume">
                                <option value="" disabled selected>Zapremina Motora</option>
                                <option v-for="volume in volumeList" :value=volume.id>
                                    {{ volume.name }}
                                </option>
                            </select>
                            <small v-if="errors['volume']" class="text-red-600">{{errors['volume']}}</small>
                        </div>

                        <CustomInput class="mb-2" v-model="car.power" :errors="errors['power']" label="Snaga Motora"/>
                        <CustomInput class="mb-2" v-model="car.year" :errors="errors['year']" label="Godina"/>

                        <div>
                            <select class="block text-gray-500 rounded-md w-full bg-white px-3 py-2 border border-gray-300 focus:z-10 sm:text-sm"
                                    v-model="car.transmission_id">
                                <option value="" disabled selected>Transmisija</option>
                                <option v-for="transmission in transmissionsList" :value=transmission.id>
                                    {{ transmission.name }}
                                </option>
                            </select>
                            <small v-if="errors['transmission']" class="text-red-600">{{errors['transmission']}}</small>
                        </div>

                        <div>
                            <select class="block text-gray-500 rounded-md w-full bg-white px-3 py-2 border border-gray-300 focus:z-10 sm:text-sm"
                                    v-model="car.fuel_id">
                                <option value="" disabled selected>Gorivo</option>
                                <option v-for="fuel in fuelsList" :value=fuel.id>
                                    {{ fuel.name }}
                                </option>
                            </select>
                            <small v-if="errors['fuel']" class="text-red-600">{{errors['fuel']}}</small>
                        </div>

                    </div>
                </div>

                <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Snimi
                    </button>
                </footer>

            </form>
        </div>
    </div>

</template>

<script setup>


import {computed, onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute, useRouter} from "vue-router";
import {getProducers} from "../../store/producer/actions.js";
import CustomInput from "../../components/core/CustomImput.vue";

const router = useRouter();
const route = useRoute()

const volumeList = computed(() => store.state.volume.volumeList)

const producer = ref('');
const type = ref('');
const errors = ref({});

const car = {
    type_id: '',
    transmission_id: '',
    fuel_id: '',
    chassis_number: '',
    engine_number: '',
    year: '',
    plate_number: '',
    volume: '',
    power: '',
}

const transmissionsList = [
    {
        id: '1',
        name: 'Manuelni'
    },
    {
        id: '2',
        name: 'Automatik'
    }
]

const fuelsList = [
    {
        id: '1',
        name: 'Dizel'
    },
    {
        id: '2',
        name: 'Benzin'
    },
    {
        id: '3',
        name: 'Plin'
    },
    {
        id: '4',
        name: 'Hibrid'
    },
    {
        id: '5',
        name: 'Elektro'
    }
]

onMounted(() => {
    // Get Type
    store.dispatch('producer/getProducerType', route.params.id)
        .then(({data}) => {
            car.type_id = data.type_id;
            producer.value = data.producer_name;
            type.value     = data.type_name;
        })
})

function onSubmit() {

    store.dispatch('car/createCar', car)
        .then(response => {
            router.push({name: 'app.dashboard'})
            store.commit('toast/showToast', `Novo vozilo "${producer.value}  ${type.value} Kreirano"!`)
        })
        .catch(({ response }) => {
            // Chassis Number
            if (response.data.errors.chassis_number) {
                response.data.errors.chassis_number[0] = 'Broj Šasije je obavezno polje!'
            } else {
                response.data.errors.chassis_number = '';
            }

            // Engine Number
            if (response.data.errors.engine_number) {
                response.data.errors.engine_number[0] = 'Broj Motora je obavezno polje!'
            } else {
                response.data.errors.engine_number = '';
            }

            // Plate Number
            // if (response.data.errors.plate_number) {
            //     response.data.errors.plate_number[0] = 'Broj Tablice je obavezno polje!'
            // } else {
            //     response.data.errors.plate_number = '';
            // }

            // Volume
            if (response.data.errors.volume) {
                response.data.errors.volume = 'Zapremina je obavezno polje!'
            } else {
                response.data.errors.volume = '';
            }

            // Power
            if (response.data.errors.power) {
                response.data.errors.power[0] = 'Snaga Motora je obavezno polje!'
            } else {
                response.data.errors.power = '';
            }

            // Year
            if (response.data.errors.year) {
                response.data.errors.year[0] = 'Godina je obavezno polje!'
            } else {
                response.data.errors.year = '';
            }

            // Transmission
            if (response.data.errors.transmission_id) {
                response.data.errors.transmission = 'Transmisija je obavezno polje!';
            } else {
                response.data.errors.transmission = '';
            }

            // Fuel
            if (response.data.errors.fuel_id) {
                response.data.errors.fuel = 'Gorivo je obavezno polje!';
            } else {
                response.data.errors.fuel = '';
            }
            errors.value = response.data.errors
        })

}


</script>

<style scoped>

</style>
