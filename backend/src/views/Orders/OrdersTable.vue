<template>
    <div class="bg-white p-4 rounded-lg shadow animate-fade-in-down">
        <div class="flex justify-between border-b-2 pb-3">
            <div class="flex items-center">
                <span class="whitespace-nowrap mr-3">Per Page</span>
                <select @change="getOrders(null)" v-model="perPage"
                        class="appearance-none relative block w-24 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div>
                <input @change="getOrders(null)" v-model="search"
                       class="appearance-none relative block w-48 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       placeholder="Search...">
            </div>
        </div>
        <table class="table-auto w-full">
            <thead>
            <tr>
                <TableHeaderCell @click="sortOrder" class="border-b p-2 text-left" field="id" :sort-field="sortField"
                                 :sort-direction="sortDirection">ID
                </TableHeaderCell>
                <TableHeaderCell class="border-b p-2 text-left" :sort-field="sortField" :sort-direction="sortDirection">
                    Customer
                </TableHeaderCell>
                <TableHeaderCell @click="sortOrder('status')" class="border-b p-2 text-left" field="status" :sort-field="sortField"
                                 :sort-direction="sortDirection">Status
                </TableHeaderCell>
                <TableHeaderCell @click="sortOrder('total_price')" class="border-b p-2 text-left" field="total_price"
                                 :sort-field="sortField" :sort-direction="sortDirection">Price
                </TableHeaderCell>
                <TableHeaderCell @click="sortOrder('created_at')" class="border-b p-2 text-left" field="created_at"
                                 :sort-field="sortField" :sort-direction="sortDirection">Date
                </TableHeaderCell>
                <TableHeaderCell field="actions">
                    Actions
                </TableHeaderCell>
            </tr>
            </thead>
            <tbody v-if="orders.loading">
            <tr>
                <td colspan="6">
                    <Spinner class="my-4" v-if="orders.loading"  />
                </td>
            </tr>
            </tbody>
            <tbody v-else>
            <tr v-for="(order, index) of orders.data">
                <td class="border-b p-2">
                    {{order.id}}
                </td>
                <td class="border-b p-2">
                    {{order.customer.first_name}} {{order.customer.last_name}}
                </td>
                <td class="border-b p-2">
                    <OrderStatus :order="order" />
                </td>
                <td class="border-b p-2">
                    {{order.total_price}}
                </td>
                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                    {{order.created_at}}
                </td>

                <td class="border-b p-2">
                    <router-link :to="{name: 'app.orders.view', params: {id: order.id}}" class="w-8 h-8 rounded-full text-indigo-700 border border-indigo-700 flex justify-center items-center
                        hover:text-white hover:bg-indigo-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </router-link>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-if="!orders.loading" class="flex justify-between items-center mt-5">
        <span>
          Showing from {{ orders.from }} to {{ orders.to }}
        </span>
            <nav
                v-if="orders.total > orders.limit"
                class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                aria-label="Pagination"
            >
                <a
                    v-for="(link, i) of orders.links"
                    :key="i"
                    :disabled="!link.url"
                    href="#"
                    @click.prevent="getForPage($event, link)"
                    aria-current="page"
                    class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
                    :class="[
              link.active
                ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
              i === 0 ? 'rounded-l-md' : '',
              i === orders.links.length - 1 ? 'rounded-r-md' : '',
              !link.url ? ' bg-gray-100 text-gray-700': ''
            ]"
                    v-html="link.label"
                >
                </a>
            </nav>
        </div>
    </div>
</template>

<script setup>
import Spinner from "../../components/core/Spinner.vue";
import {ref, computed, onMounted} from "vue";
import store from "../../store";
import { ORDERS_PER_PAGE } from "../../constants";
import TableHeaderCell from "../../components/core/Table/TableHeaderCell.vue";
import OrderStatus from "./OrderStatus.vue";

const emit = defineEmits(['clickEdit'])
const perPage = ref(ORDERS_PER_PAGE);
const search = ref('');
const orders = computed(() => store.state.order.orders);
const sortField = ref('updated_at');
const sortDirection = ref('asc');

onMounted(() => {
    getOrders();
});

function getOrders(url = null) {
    store.dispatch('order/getOrders', {
        url,
        sort_field: sortField.value,
        sort_direction: sortDirection.value,
        search: search.value,
        perPage: perPage.value,
    });
}

function getForPage(ev, link) {
    if (!link.url || link.active) {
        ev.preventDefault();
    }
    getOrders(link.url);
}

// Sort Order
function sortOrder(field) {
    if (sortField.value === field) {
        if (sortDirection.value === 'asc') {
            sortDirection.value = 'desc'
        } else {
            sortDirection.value = 'asc'
        }
    } else {
        sortField.value = field;
        sortDirection.value = 'asc'
    }
    getOrders();
}

// Edit Order
function showOrder(order) {
    emit('clickShow', order)
}

// Delete Order
function deleteOrder(order) {
    if (!confirm(`Are you sure you want to delete the Order?`)) {
        return;
    }
    store.dispatch('order/deleteOrder', order)
        .then(res => {
            // Notify
            store.dispatch('order/getOrders')
        })
}

</script>

<style scoped>

</style>
