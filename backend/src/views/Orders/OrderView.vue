<template>
    <div v-if="order">
        <h2 class="flex justify-between items-center text-xl font-semibold mb-2 pb-2 border-b border-gray-400">
            Order Details
            <OrderStatus :order="order" />
        </h2>
        <table>
            <tbody>
            <tr>
                <td class="font-bold py-1 px-2">Order #</td>
                <td>{{order.id}}</td>
            </tr>
            <tr>
                <td class="font-bold py-1 px-2">Order Date</td>
                <td>{{order.created_at}}</td>
            </tr>
            <tr>
                <td class="font-bold py-1 px-2">Order Status</td>
                <td>
                    <select v-model="order.status" @change="onStatusChange" class="bg-gray-500 border border-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2 dark:border-s-gray-400 dark:border-gray-600 dark:placeholder-gray-700 dark:focus:border-gray-500">
                        <option v-for="status of orderStatuses" :value="status">{{status}}</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="font-bold py-1 px-2">SubTotal</td>
                <td>{{ order.total_price }}</td>
            </tr>
            </tbody>
        </table>

        <h2 class="text-1xl font-semibold mt-6 pb-2 border-b border-gray-400">Customer Details</h2>
        <table>
            <tbody>
            <tr>
                <td class="font-bold py-1 px-2">Full Name</td>
                <td>{{order.customer.first_name}} {{order.customer.last_name}}</td>
            </tr>
            <tr>
                <td class="font-bold py-1 px-2">Email</td>
                <td>{{order.customer.email}}</td>
            </tr>
            <tr>
                <td class="font-bold py-1 px-2">Phone</td>
                <td>{{order.customer.phone}}</td>
            </tr>
            <tr>
                <td class="font-bold py-1 px-2">SubTotal</td>
                <td>{{ order.total_price }}</td>
            </tr>
            </tbody>
        </table>
        <!--  Addresses Details-->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <h2 class="text-1xl font-semibold mt-6 pb-2 border-b border-gray-300">Billing Address</h2>
                <!--  Billing Address Details-->
                <div>
                    {{ order.customer.billingAddress.address1 }}, {{ order.customer.billingAddress.address2 }} <br>
                    {{ order.customer.billingAddress.city }}, {{ order.customer.billingAddress.zipcode }} <br>
                    {{ order.customer.billingAddress.state }}, {{ order.customer.billingAddress.country }} <br>
                </div>
                <!--/  Billing Address Details-->
            </div>
            <div>
                <h2 class="text-1xl font-semibold mt-6 pb-2 border-b border-gray-300">Shipping Address</h2>
                <!--  Shipping Address Details-->
                <div>
                    {{ order.customer.shippingAddress.address1 }}, {{ order.customer.shippingAddress.address2 }} <br>
                    {{ order.customer.shippingAddress.city }}, {{ order.customer.shippingAddress.zipcode }} <br>
                    {{ order.customer.shippingAddress.state }}, {{ order.customer.shippingAddress.country }} <br>
                </div>
                <!--/  Shipping Address Details-->
            </div>
        </div>
        <!--/  Customer Details-->

        <h2 class="text-1xl font-semibold mt-6 pb-2 border-b border-gray-400">Order Items</h2>

        <!-- Order Item -->
        <div v-for="item of order.items" class="flex flex-col sm:flex-row items-center  gap-4">
            <a href="#"
               class="w-36 h-32 flex items-center justify-center overflow-hidden">
                <img :src="item.product.image" class="object-cover" alt=""/>
            </a>
            <div class="flex flex-col justify-between flex-1">
                <div class="flex justify-between mb-3">
                    <h3>
                        {{item.product.title}}
                    </h3>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">Qty: {{item.quantity}}</div>
                    <span class="text-lg font-semibold"> {{item.unit_price}} </span>
                </div>
            </div>
        </div>
        <!--/ Order Item -->
    </div>
</template>

<script setup>

import {onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute} from "vue-router";
import axiosClient from "../../axios.js";
import OrderStatus from "./OrderStatus.vue";

const route = useRoute()

const order = ref(null);
const orderStatuses = ref([]);

onMounted(() => {
    store.dispatch('order/getSingleOrder', route.params.id)
        .then(({data}) => {
            order.value = data
        })

    // Get All Statuses
    axiosClient.get(`/orders/statuses`)
        .then(({data}) => {
            orderStatuses.value = data
        })
})

function onStatusChange() {
    axiosClient.post(`/orders/change-status/${order.value.id}/${order.value.status}`)
        .then(({data}) => {
            // Show Notification
            store.commit('toast/showToast', `Order Status was successfully change into "${order.value.status}" `)
        })

}


</script>


<style scoped>

</style>
