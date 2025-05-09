<template>
  <div class="mb-2 flex items-center justify-between">
    <h1 class="text-3xl font-semibold">Dashboard</h1>
    <div class="flex items-center">
      <label class="mr-2">Change Date Period</label>
      <CustomInput type="select" v-model="chosenDate" @change="onDatePickerChange" :select-options="dateOptions" />
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
    <!-- Active Customers-->
    <div class="animate-fade-in-down bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center" style="animation-delay: 0.1s">
      <label class="text-lg font-semibold block mb-2">Active Customers</label>
      <template v-if="!loading.customersCount">
        <span class="text-3xl font-semibold">{{customersCount}}</span>
      </template>
      <Spinner v-else text="" class="" />
    </div>
    <!--/ Active Customers-->
    <!--  Active Products-->
    <div class="animate-fade-in-down bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center" style="animation-delay: 0.2s">
      <label class="text-lg font-semibold block mb-2">Active Products</label>
      <template v-if="!loading.productsCount">
        <span class="text-3xl font-semibold">{{ productsCount }}</span>
      </template>
      <Spinner v-else text="" class="" />
    </div>
    <!--/ Active Products-->
    <!--  Paid Orders-->
    <div class="animate-fade-in-down bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center" style="animation-delay: 0.3s">
      <label class="text-lg font-semibold block mb-2">Paid Orders</label>
      <template v-if="!loading.paidOrders">
        <span class="text-3xl font-semibold">{{ paidOrders }}</span>
      </template>
      <Spinner v-else text="" class="" />
    </div>
    <!--/ Paid Orders-->
    <!--  Total Income-->
    <div class="animate-fade-in-down bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center" style="animation-delay: 0.4s">
      <label class="text-lg font-semibold block mb-2">Total Income</label>
      <template v-if="!loading.totalIncome">
        <span class="text-3xl font-semibold">{{ totalIncome }}</span>
      </template>
      <Spinner v-else text="" class="" />
    </div>
    <!--/ Total Income-->
  </div>

  <div class="grid grid-cols-1 py-3 md:grid-cols-2 gap-3">
    <!-- Doughnut Chart -->
    <div class="bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center">
      <label class="text-lg font-semibold block mb-2">Orders By Country</label>
      <template v-if="!loading.ordersByCountry">
        <DoughnutChart :chart-data="ordersByCountry" :options="options" css-classes="chart-container" />
      </template>
      <Spinner v-else text="" class="" />
    </div>
    <!--/ Doughnut Chart -->

    <!-- Doughnut Chart -->
    <div class="bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center">
      <label class="text-lg font-semibold block mb-2">Orders By Country</label>
      <template v-if="!loading.ordersByCountry">
        <BarChart :chart-data="ordersByCountry" :options="options" css-classes="chart-container" />
      </template>
    </div>
    <!--/ Doughnut Chart -->

    <!-- Latest Orders -->
    <div class="bg-white py-6 px-5 rounded-lg shadow ">
      <label class="text-lg font-semibold block mb-2">Latest Orders</label>
      <template v-if="!loading.latestOrders">
        <div v-for="order of latestOrders" :key="order.id" class="py-2 px-3 hover:bg-gray-200">
          <p>
            <router-link :to="{name: 'app.orders.view', params: {id: order.id}}" class="text-gray-600 font-semibold">
              Order #{{ order.id }}
            </router-link>
            created {{ order.created_at }} . {{ order.items }} items
          </p>
          <p class="flex justify-between">
            <span>{{ order.first_name }} {{ order.last_name}}</span>
            <span class="text-gray-500">  {{ $filters.currencyUSD(order.total_price) }}</span>
          </p>
        </div>
      </template>
      <Spinner v-else text="" class="" />
    </div>
    <!--/ Latest Orders -->

    <!-- Latest Customers -->
    <div class="bg-white py-6 px-5 rounded-lg shadow ">
      <label class="text-lg font-semibold block mb-2">Latest Customers</label>
      <template v-if="!loading.latestCustomers">
        <router-link :to="{name: 'app.customers.view', params: {id: customer.id}}" v-for="customer of latestCustomers" :key="customer.id" class="mb-3 flex hover:bg-gray-200">
          <div class="w-8 h-8 bg-gray-200 flex items-center justify-center rounded-full mr-2">
            <UserIcon class="w-5" />
          </div>
          <div>
            <h3>{{ customer.first_name }} {{ customer.last_name }}</h3>
            <p>{{ customer.email }}</p>
          </div>
        </router-link>
      </template>
      <Spinner v-else text="" class="" />
    </div>
    <!--/ Latest Customers -->
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


const customersCount = ref(0);
const productsCount = ref(0);
const paidOrders = ref(0);
const totalIncome = ref(0);
const ordersByCountry = ref({});
const latestCustomers = ref([]);
const latestOrders = ref([]);

const chosenDate = ref('all');
const dateOptions = computed(() => store.state.date.dateOptions);

const loading = ref({
  customersCount: true,
  productsCount: true,
  paidOrders: true,
  totalIncome: true,
  ordersByCountry: true,
  latestCustomers: true,
  latestOrders: true,
});

const options = ref({
  plugins: {
    title: {
      text: ""
    }
  }
})

function updateDashboard() {

  const date = chosenDate.value;

  loading.value = {
    customersCount: true,
    productsCount: true,
    paidOrders: true,
    totalIncome: true,
    ordersByCountry: true,
    latestCustomers: true,
    latestOrders: true,
  }

  // Get Customers Count
  axiosClient.get(`/dashboard/customers-count`, {params: {date}})
      .then(({ data }) => {
        customersCount.value = data
        loading.value.customersCount = false;
      })

  // Get Products Count
  axiosClient.get(`/dashboard/products-count`, {params: {date}})
      .then(({ data }) => {
        productsCount.value = data
        loading.value.productsCount = false;
      })

  // Get Paid Orders
  axiosClient.get(`/dashboard/orders-count`, {params: {date}})
      .then(({ data }) => {
        paidOrders.value = data
        loading.value.paidOrders = false;
      })

  // Get Total Income
  axiosClient.get(`/dashboard/income-amount`, {params: {date}})
      .then(({ data }) => {
        totalIncome.value = new Intl.NumberFormat('en-US', {
          style: 'currency',
          currency: 'USD',
          minimumFractionDigits: 0,
        }).format(data);
        loading.value.totalIncome = false;
      })

  // Get Orders By Country
  axiosClient.get(`/dashboard/orders-by-country`, {params: {date}})
      .then(({ data: countries }) => {
        const chartData = {
          labels: [],
          datasets: [{
            label: [],
            data: [],
            backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#ea900c'],
          }]
        }

        countries.forEach(c => {
          chartData.labels.push(c.name);
          chartData.datasets[0].data.push(c.count);
          chartData.datasets[0].label.push(c.name);
        })

        ordersByCountry.value = chartData;
        loading.value.ordersByCountry = false;
      })

  // Latest Orders
  axiosClient.get(`/dashboard/latest-orders`, {params: {date}})
      .then(({ data }) => {
        latestOrders.value = data.data
        loading.value.latestOrders = false;
      })

  // Latest Customers
  axiosClient.get(`/dashboard/latest-customers`, {params: {date}})
      .then(({ data }) => {
        latestCustomers.value = data
        loading.value.latestCustomers = false;
      })

}

function onDatePickerChange() {
  updateDashboard()
}

onMounted(() => updateDashboard())

</script>

<style scoped>

</style>
