<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Svi Servisi</h1>
    </div>
    <div class="justify-between mb-3">


        <div v-if="carServices" class="px-4 pt-5 pb-4 py-2 mt-2">
            <div v-for="item of carServices" class="w-full">

                    <div class="justify-between mb-3"  v-if="item.oil === 1">
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
                        <div class="text-2xl w-full mt-2 p-2" v-if="item.oil === 1">
                            <div class="flex flex-row">

                                <div class="border-gray-500 px-4 pb-4">
                                    <div class="grid grid-cols-1 md:grid-cols-1 gap-2 text-xl">
                                        <div>
                                            <h3>Ulje: <span>Da</span></h3>
                                            <h3>Naziv Ulja: <span>{{item.oil_name}}</span></h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 pb-4 text-xl">
                                    <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
                                        <div>
                                            <h3>
                                                Filter Ulja:
                                                <span v-if="item.oil_filter">
                                                Da
                                            </span>
                                                <span v-else>
                                                Ne
                                            </span>
                                            </h3>

                                            <h3>
                                                Filter Vazduha:
                                                <span v-if="item.air_filter">
                                                Da
                                            </span>
                                                <span v-else>
                                                Ne
                                            </span>
                                            </h3>

                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 pb-4 text-xl">
                                    <div class="grid grid-cols-1 md:grid-cols-1">
                                        <div>
                                            <h3>
                                                Filter Kabine:
                                                <span v-if="item.inner_filter">
                                                Da
                                            </span>
                                                <span v-else>
                                                Ne
                                            </span>
                                            </h3>

                                            <h3>
                                                Filter Goriva:
                                                <span v-if="item.fuel_filter">
                                                Da
                                            </span>
                                                <span v-else>
                                                Ne
                                            </span>
                                            </h3>
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
                                        <div>
                                            <h3>
                                                Prednje Pločice:
                                                <span v-if="item.brake_pads_front">
                                                    Da
                                                </span>
                                                <span v-else>
                                                    Ne
                                                </span>
                                            </h3>

                                            <h3>
                                                Zadnje Pločice:
                                                <span v-if="item.brake_pads_rear">
                                                    Da
                                                </span>
                                                <span v-else>
                                                    Ne
                                                </span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 pb-4 text-xl">
                                    <div class="grid grid-cols-1 md:grid-cols-1">
                                        <div>
                                            <h3>
                                                Prednji Diskovi:
                                                <span v-if="item.disc_front">
                                                    Da
                                                </span>
                                                <span v-else>
                                                    Ne
                                                </span>
                                            </h3>

                                            <h3>
                                                Zadnji Diskovi:
                                                <span v-if="item.disc_rear">
                                                    Da
                                                </span>
                                                <span v-else>
                                                    Ne
                                                </span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 pb-4 text-xl">
                                    <div class="grid grid-cols-1 md:grid-cols-1">
                                        <div>
                                            <h3>
                                                Prednja Lijeva Kliješta:
                                                <span v-if="item.front_left_cylinder">
                                                    Da
                                                </span>
                                                <span v-else>
                                                    Ne
                                                </span>
                                            </h3>

                                            <h3>
                                                Prednja Desna Kliješta:
                                                <span v-if="item.front_right_cylinder">
                                                    Da
                                                </span>
                                                <span v-else>
                                                    Ne
                                                </span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 pb-4 text-xl">
                                    <div class="grid grid-cols-1 md:grid-cols-1">
                                        <div>

                                            <h3>
                                                Zadnja Lijeva Kliješta:
                                                <span v-if="item.rear_left_cylinder">
                                                    Da
                                                </span>
                                                <span v-else>
                                                    Ne
                                                </span>
                                            </h3>

                                            <h3>
                                                Zadnja Desna Kliješta:
                                                <span v-if="item.rear_right_cylinder">
                                                    Da
                                                </span>
                                                <span v-else>
                                                    Ne
                                                </span>
                                            </h3>
                                        </div>
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
                                <div class="grid grid-cols-1 md:grid-cols-1">
                                    <div>
                                        <h3>
                                            Zupčasti Kaiš:
                                            <span v-if="item.belt">
                                                    Da
                                                </span>
                                            <span v-else>
                                                    Ne
                                                </span>
                                        </h3>

                                        <h3>
                                            Vodena Pumpa:
                                            <span v-if="item.water_pump">
                                                    Da
                                                </span>
                                            <span v-else>
                                                    Ne
                                                </span>
                                        </h3>


                                    </div>
                                </div>
                            </div>

                            <div class="px-4 pb-4 text-xl">
                                <div class="grid grid-cols-1 md:grid-cols-1">
                                    <div>
                                        <h3>
                                            Španer Z. Remena:
                                            <span v-if="item.spanner">
                                                    Da
                                                </span>
                                            <span v-else>
                                                    Ne
                                                </span>
                                        </h3>
                                        <h3>
                                            Španer Rolna:
                                            <span v-if="item.roll">
                                                    Da
                                                </span>
                                            <span v-else>
                                                    Ne
                                                </span>
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="px-4 pb-4 text-xl">
                                <div class="grid grid-cols-1 md:grid-cols-1">
                                    <div>
                                        <h3>
                                            Trakasti Remen:
                                            <span v-if="item.outside_belt">
                                                    Da
                                                </span>
                                            <span v-else>
                                                    Ne
                                                </span>
                                        </h3>
                                        <h3>
                                            Španer Trak. Remena:
                                            <span v-if="item.outside_spanner">
                                                    Da
                                                </span>
                                            <span v-else>
                                                    Ne
                                                </span>
                                        </h3>
                                    </div>
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
import {PrinterIcon} from "@heroicons/vue/solid";

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
