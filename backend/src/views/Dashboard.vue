<template>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
        <div class="animate-fade-in-down bg-white rounded-lg shadow flex flex-col items-center justify-center" style="animation-delay: 0.1s">
            <router-link :to="{name: 'app.producer.view'}" class="flex items-center w-full h-full rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-500">
                <span class="text-3xl mt-4 mb-4">
                    Vozilo
              </span>
            </router-link>
        </div>

        <div class="animate-fade-in-down bg-white rounded-lg shadow flex flex-col items-center justify-center" style="animation-delay: 0.2s">
            <router-link :to="{name: 'app.owners.view'}" class="flex items-center w-full h-full rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-500">
                <span class="text-3xl">
                    Vlasnik
              </span>
            </router-link>
        </div>

<!--        <div class="animate-fade-in-down bg-white rounded-lg shadow flex flex-col items-center justify-center" style="animation-delay: 0.3s">-->
<!--            <router-link :to="{name: 'app.orders'}" class="py-10 flex items-center w-full h-full rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-500">-->
<!--                <span class="text-3xl">-->
<!--                    Nalog-->
<!--              </span>-->
<!--            </router-link>-->
<!--        </div>-->

<!--        <div class="animate-fade-in-down bg-white rounded-lg shadow flex flex-col items-center justify-center" style="animation-delay: 0.3s">-->
<!--            <router-link :to="{name: 'app.orders'}" class="py-10 flex items-center w-full h-full rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-500">-->
<!--                <span class="text-3xl">-->
<!--                    Servis-->
<!--              </span>-->
<!--            </router-link>-->
<!--        </div>-->

    </div>

    <div class="grid grid-rows-1 md:grid-rows-2 md:grid-flow-col grid-cols-1 md:grid-cols-4 gap-3">
        <div class="col-span-1 md:col-span-2 row-span-1 md:row-span-2 bg-white py-6 px-5 rounded-lg shadow">
            <label class="text-lg font-semibold block mb-2">Današnji Servisi</label>
            <template v-if="!loading.todayService">
                <div v-if="todayServices" >
                    <div v-for="service of todayServices" :key="service.id" class="py-2 px-3 hover:bg-gray-50">
                        <p>
                        <span class="text-gray-700 py-2 px-2 rounded">
                            <b>Vozilo:</b> {{ service.producer_name }} {{ service.type_name }}
                        </span>
                        </p>
                        <p>
                        <span class="text-gray-700 py-2 px-2 rounded">
                            <b>Vlasnik:</b> {{ service.first_name }} {{ service.last_name }}
                        </span>
                        </p>
                        <p class="flex justify-between">
                            <span></span>
                            <span class="text-gray-700">
                                <router-link :to="{name: 'app.TodayServiceDetails', params: {book_id: service.id, service_id: service.car_service_id}}" class="text-gray-600 font-semibold">
                                      Detalji
                                </router-link>
                            </span>
                        </p>
                    </div>
                </div>
                <div v-else>
                    Trenutno nemate servisa.
                </div>

            </template>
            <Spinner v-else text="" />
        </div>
    </div>

</template>

<script setup>

import {computed, onMounted, ref} from "vue";
import {Chart, BarController, CategoryScale, LinearScale, BarElement, DoughnutController, ArcElement} from "chart.js";
import Spinner from "../components/core/Spinner.vue";
import store from "../store/index.js";
import axiosClient from "../axios.js";

Chart.register(BarController, CategoryScale, LinearScale, BarElement, DoughnutController, ArcElement)


const user = store.state.user.user.data;
const service = ref({});
const todayServices = ref([]);

const loading = ref({
    serviceName: true,
    todayService: true,
});

onMounted(() => {
    store.dispatch('service/getService', user.id)
        .then(({data}) => {
            store.dispatch('service/getServiceByServiceId', data.id)
            if (data) {
                service.value = data;
                loading.value.todayService = false;
            }
        })

    // Show Today's Service
    updateDashboard();
})

function updateDashboard() {

    loading.value = {
        todayService: true,
    };

    // Show today's Services in Dashboard
    axiosClient.get(`/show-today-services`)
        .then(({ data: services }) => {
            todayServices.value = services;
            loading.value.todayService = false;
        })

}

</script>

<style scoped>

</style>
