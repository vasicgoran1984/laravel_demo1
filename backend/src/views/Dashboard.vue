<template>
  <div class="mb-2 flex items-center justify-between">
      <div class="bg-gray-100 px-4 pt-5 pb-4 py-2">
          <div v-if="!loading.serviceName" >
              <h1 class="text-3xl font-semibold">{{service.name_service}}</h1>
              <span>{{service.city}}</span>
          </div>

          <div v-else>
              <Spinner class="text-3xl font-semibold" text="" />
          </div>

      </div>

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
