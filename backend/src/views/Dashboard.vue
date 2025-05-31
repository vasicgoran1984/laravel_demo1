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

</template>

<script setup>

import { BarChart, DoughnutChart } from "vue-chart-3";
import {computed, onMounted, ref} from "vue";
import {Chart, BarController, CategoryScale, LinearScale, BarElement, DoughnutController, ArcElement} from "chart.js";
import axiosClient from "../axios.js";
import Spinner from "../components/core/Spinner.vue";
import {UserIcon} from "@heroicons/vue/outline";
import CustomInput from "../components/core/CustomImput.vue";
import store from "../store/index.js";
import {ViewListIcon} from "@heroicons/vue/solid";

Chart.register(BarController, CategoryScale, LinearScale, BarElement, DoughnutController, ArcElement)


const user = store.state.user.user.data;
const service = ref({});

const loading = ref({
  serviceName: true,
});

onMounted(() => {

    store.dispatch('service/getService', user.id)
        .then(({data}) => {
            store.dispatch('service/getServiceByServiceId', data.id)
            if (data) {
                service.value = data;
                loading.value.serviceName = false;
            }
        })
})

</script>

<style scoped>

</style>
