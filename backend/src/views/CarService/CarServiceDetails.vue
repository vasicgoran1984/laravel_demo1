<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Svi Servisi</h1>
    </div>
    <div class="justify-between mb-3">


        <div v-if="carServices" class="px-4 pt-5 pb-4 py-2 mt-2">
            <div v-for="item of carServices" class="w-full">

                    <div class="justify-between mb-3">
                        <div class="text-2xl bg-blue-500 w-full font-bold p-2 text-white flow-root">
                                <div class="float-left">
                                    <h3>Mali Servis | Kilometri: {{item.kilometers}}</h3>
                                </div>
                                <div class="float-right">
                                    <button @click="showPdf(item.id)">
                                        <PrinterIcon class="text-3xl size-8 mr-2 h-5 w-5 text-white" aria-hidden="true"/>
                                    </button>
                                </div>
                        </div>
                        <div class="text-2xl w-full mt-2 p-2">
                            <div class="flex flex-row">

                                <div class="border-gray-500 px-4 pb-4">
                                    <div class="grid grid-cols-1 md:grid-cols-1 gap-2 text-xl">
                                        <div v-if="item.oil_name" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                            <span class="mr-2 text-gray-900">
                                                <CheckIcon class="w-5" />
                                            </span>
                                            <span class="text-1xl">
                                                {{item.oil_name}}
                                            </span>
                                        </div>
                                        <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                            <span class="mr-2 text-gray-900">
                                                <x-icon class="w-5" />
                                            </span>
                                            <span class="text-1xl">
                                                Ulje
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 pb-4 text-xl">

                                    <div v-if="item.oil_filter" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Filter Ulja
                                        </span>
                                    </div>
                                    <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Filter Ulja
                                        </span>
                                    </div>

                                    <div v-if="item.air_filter" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Filter Vazduha
                                        </span>
                                    </div>
                                    <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Filter Vazduha
                                        </span>
                                    </div>

                                </div>

                                <div class="px-4 pb-4 text-xl">

                                    <div v-if="item.inner_filter" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Filter Kabine
                                        </span>
                                    </div>
                                    <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Filter Kabine
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-1">
                                        <div v-if="item.fuel_filter" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                            <span class="mr-2 text-gray-900">
                                                <CheckIcon class="w-5" />
                                            </span>
                                            <span class="text-1xl">
                                                Filter Goriva
                                            </span>
                                        </div>
                                        <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                            <span class="mr-2 text-gray-900">
                                                <x-icon class="w-5" />
                                            </span>
                                            <span class="text-1xl">
                                                Filter Goriva
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="justify-between mb-3"
                         v-if="item.brake_pads_front === 1 ||
                             item.brake_pads_rear === 1 ||
                             item.disc_front === 1 ||
                             item.disc_rear === 1 ||
                             item.front_left_cylinder === 1 ||
                             item.front_right_cylinder === 1 ||
                             item.rear_left_cylinder === 1 ||
                             item.rear_right_cylinder === 1"
                    >
                        <div class="text-2xl bg-green-500 w-full font-bold p-2 text-white flow-root">
                            <div class="float-left">
                                <h3>Kočnice | Kilometri: {{item.kilometers}}</h3>
                            </div>
                            <div class="float-right">
                                <button @click="showPdf(item.id)">
                                    <PrinterIcon class="text-3xl size-8 mr-2 h-5 w-5 text-white" aria-hidden="true"/>
                                </button>
                            </div>
                        </div>
                        <div class="text-2xl w-full mt-2 p-2">
                            <div class="flex flex-row">
                                <div class="px-4 pb-4 text-xl">
                                    <div class="grid grid-cols-1 md:grid-cols-1">

                                        <div v-if="item.brake_pads_front" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                            <span class="mr-2 text-gray-900">
                                                <CheckIcon class="w-5" />
                                            </span>
                                            <span class="text-1xl">
                                                Prednje Pločice
                                            </span>
                                        </div>
                                        <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                            <span class="mr-2 text-gray-900">
                                                <x-icon class="w-5" />
                                            </span>
                                            <span class="text-1xl">
                                                Prednje Pločice
                                            </span>
                                        </div>

                                        <div v-if="item.brake_pads_rear" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                            <span class="mr-2 text-gray-900">
                                                <CheckIcon class="w-5" />
                                            </span>
                                            <span class="text-1xl">
                                                Zadnje Pločice
                                            </span>
                                        </div>
                                        <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                            <span class="mr-2 text-gray-900">
                                                <x-icon class="w-5" />
                                            </span>
                                            <span class="text-1xl">
                                                Zadnje Pločice
                                            </span>
                                        </div>

                                    </div>
                                </div>

                                <div class="px-4 pb-4 text-xl">
                                    <div v-if="item.disc_front" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Prednji Diskovi
                                        </span>
                                    </div>
                                    <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Prednji Diskovi
                                        </span>
                                    </div>

                                    <div v-if="item.disc_rear" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Zadnji Diskovi
                                        </span>
                                    </div>
                                    <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Zadnji Diskovi
                                        </span>
                                    </div>
                                </div>

                                <div class="px-4 pb-4 text-xl">
                                    <div v-if="item.front_left_cylinder" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Prednja Lijeva Kliješta
                                        </span>
                                    </div>
                                    <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Prednja Lijeva Kliješta
                                        </span>
                                    </div>

                                    <div v-if="item.front_right_cylinder" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Prednja Desna Kliješta
                                        </span>
                                    </div>
                                    <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Prednja Desna Kliješta
                                        </span>
                                    </div>
                                </div>

                                <div class="px-4 pb-4 text-xl">
                                    <div v-if="item.rear_left_cylinder" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Zadnja Lijeva Kliješta
                                        </span>
                                    </div>
                                    <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Zadnja Lijeva Kliješta
                                        </span>
                                    </div>

                                    <div v-if="item.rear_right_cylinder" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Zadnja Desna Kliješta
                                        </span>
                                    </div>
                                    <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                        <span class="text-1xl">
                                            Zadnja Desna Kliješta
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="justify-between mb-3"
                     v-if="item.belt === 1"
                >
                    <div class="text-2xl bg-orange-500 w-full font-bold p-2 text-white flow-root">
                        <div class="float-left">
                            <h3>Veliki Servis | Kilometri: {{item.kilometers}}</h3>
                        </div>
                        <div class="float-right">
                            <button @click="showPdf(item.id)">
                                <PrinterIcon class="text-3xl size-8 mr-2 h-5 w-5 text-white" aria-hidden="true"/>
                            </button>
                        </div>
                    </div>
                    <div class="text-2xl w-full mt-2 p-2">
                        <div class="flex flex-row">
                            <div class="px-4 pb-4 text-xl">
                                <div v-if="item.belt" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Zupčasti Kaiš
                                        </span>
                                </div>
                                <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Zupčasti Kaiš
                                        </span>
                                </div>

                                <div v-if="item.water_pump" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Vodena Pumpa
                                        </span>
                                </div>
                                <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Vodena Pumpa
                                        </span>
                                </div>
                            </div>

                            <div class="px-4 pb-4 text-xl">
                                <div v-if="item.spanner" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Španer Z. Remena
                                        </span>
                                </div>
                                <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Španer Z. Remena
                                        </span>
                                </div>
                                <div v-if="item.roll" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Španer Rolna
                                        </span>
                                </div>
                                <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Španer Rolna
                                        </span>
                                </div>
                            </div>

                            <div class="px-4 pb-4 text-xl">
                                <div v-if="item.outside_belt" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <CheckIcon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Trakasti Remen
                                        </span>
                                </div>
                                <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                        <span class="mr-2 text-gray-900">
                                            <x-icon class="w-5" />
                                        </span>
                                    <span class="text-1xl">
                                            Trakasti Remen
                                        </span>
                                </div>
                                <div v-if="item.outside_spanner" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                    <span class="mr-2 text-gray-900">
                                        <CheckIcon class="w-5" />
                                    </span>
                                    <span class="text-1xl">
                                        Španer Trak. Remena
                                    </span>
                                </div>
                                <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                    <span class="mr-2 text-gray-900">
                                        <x-icon class="w-5" />
                                    </span>
                                    <span class="text-1xl">
                                        Španer Trak. Remena
                                    </span>
                                </div>
                            </div>

                            <div class="px-4 pb-4 text-xl">
                                <div v-if="item.alt_pulley" class="flex items-center p-2 transition-colors hover:bg-black/30">
                                    <span class="mr-2 text-gray-900">
                                        <CheckIcon class="w-5" />
                                    </span>
                                    <span class="text-1xl">
                                        Španer Alternatora
                                    </span>
                                </div>
                                <div v-else class="flex items-center p-2 transition-colors hover:bg-black/30">
                                   <span class="mr-2 text-gray-900">
                                       <x-icon class="w-5" />
                                    </span>
                                    <span class="text-1xl">
                                        Španer Alternatora
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="w-full">
            <Spinner class="my-4" />
        </div>

    </div>
</template>

<script setup>


import {computed, onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute} from "vue-router";
import Spinner from "../../components/core/Spinner.vue";
import {PrinterIcon, CheckIcon, XIcon} from "@heroicons/vue/solid";

const loading = ref(true);
const route = useRoute()
const carServices = ref(null);
const currentUser = store.state.user.user.data


onMounted(() => {
    showAllCarServices();
})

function showAllCarServices() {
    store.dispatch('carService/showAllCarServicesByBookId', route.params.book_id)
        .then(({data}) => {
            console.log(data)
            loading.value = false;
            carServices.value = data;
        })
}

function printInvoice(car_service_id) {
    store.dispatch('carService/printInvoice', car_service_id)
        .then(({data}) => {
            loading.value = false;
        })
}

function showPdf(item) {
    const userId = currentUser.id
    window.open(
        `http://localhost:8001/export-pdf/${item}/${userId}`,
        '_blank' // Open in a new window.
    );
}

function UnusedPrintPdf(car_service_id) {
    return axios({
        url: `export-invoice/${car_service_id}`,
        method: 'GET',
        responseType: 'blob',
    }).then((response) => {
        console.log(response)
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'pdf.pdf');
        document.body.appendChild(link);
        link.click();
    })
}

</script>

<style scoped>

</style>
