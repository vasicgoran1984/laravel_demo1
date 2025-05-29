<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Orders</h1>
    </div>
    <OrdersTable @clickView="viewOrder" />
</template>


<script setup>

import {computed, ref} from "vue";
import OrdersTable from "./OrdersTable.vue";
import store from "../../store/index.js";

const order = computed(() => store.state.order.orders)


</script>


<style scoped>

</style>
