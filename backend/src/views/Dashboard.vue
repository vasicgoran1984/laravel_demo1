<template>
    <h1 class="text-4xl mb-3">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
        <!-- Active Customers-->
        <div class="bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center">
            <label>Active Customers</label>
            <template v-if="!loading.customersCount">
                <span class="text-3xl font-semibold">{{customersCount}}</span>
            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/ Active Customers-->
        <!--  Active Products-->
        <div class="bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center">
            <label>Active Products</label>
            <template v-if="!loading.productsCount">
                <span class="text-3xl font-semibold">{{ productsCount }}</span>
            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/ Active Products-->
        <!--  Paid Orders-->
        <div class="bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center">
            <label>Paid Orders</label>
            <template v-if="!loading.paidOrders">
                <span class="text-3xl font-semibold">{{ paidOrders }}</span>
            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/ Paid Orders-->
        <!--  Total Income-->
        <div class="bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center">
            <label>Total Income</label>
            <template v-if="!loading.totalIncome">
                <span class="text-3xl font-semibold">${{ totalIncome }}</span>
            </template>
            <Spinner v-else text="" class="" />
        </div>
        <!--/ Total Income-->
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="col-span-2 row-span-2 bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center">
            Products
        </div>
        <div class="col-span-2 bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center">
            <DoughnutChart :data="ordersByCountry" />
        </div>
        <div class="col-span-2 bg-white py-6 px-5 rounded-lg shadow flex flex-col items-center justify-center">
            Customers
        </div>
    </div>
</template>


<script setup>
import DoughnutChart from "../components/core/Charts/Doughnut.vue";
import {ref} from "vue";
import axiosClient from "../axios.js";
import Spinner from "../components/core/Spinner.vue";

const loading = ref({
    customersCount: true,
    productsCount: true,
    paidOrders: true,
    totalIncome: true,
});

const customersCount = ref(0);
const productsCount = ref(0);
const paidOrders = ref(0);
const totalIncome = ref(0);
const ordersByCountry = ref({});

// Get Customers Count
axiosClient.get(`/dashboard/customers-count`)
    .then(({ data }) => {
        customersCount.value = data
        loading.value.customersCount = false;
    })
// Get Products Count
axiosClient.get(`/dashboard/products-count`)
    .then(({ data }) => {
        productsCount.value = data
        loading.value.productsCount = false;
    })
// Get Paid Orders
axiosClient.get(`/dashboard/orders-count`)
    .then(({ data }) => {
        paidOrders.value = data
        loading.value.paidOrders = false;
    })
// Get Total Income
axiosClient.get(`/dashboard/income-amount`)
    .then(({ data }) => {
        totalIncome.value = data
        loading.value.totalIncome = false;
    })
// Get Orders By Country
axiosClient.get(`/dashboard/orders-by-country`)
    .then(({ data: countries }) => {
        const chartData = {
            labels: [],
            datasets: [{
                backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#ea900c'],
                data: []
            }]
        }
        countries.forEach(c => {
            chartData.labels.push(c.name);
            chartData.datasets[0].data.push(c.count);
        })

        ordersByCountry.value = chartData;
        loading.value.ordersByCountry = false;
    })


</script>

<style scoped>

</style>
