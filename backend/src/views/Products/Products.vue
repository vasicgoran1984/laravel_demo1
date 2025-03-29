<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Products</h1>
        <button type="button"
                @click="showAddNewModal()"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Add new Product
        </button>
    </div>
    <ProductModal v-model="showProductModal" :product="productModel" @close="onModalClose"/>
    <ProductsTable @clickEdit="editProduct" />
</template>

<script setup>


import ProductsTable from "./ProductsTable.vue";
import ProductModal from "./ProductModal.vue";
import {computed, ref} from "vue";
import store from "../../store/index.js";



const DEFAULT_PRODUCT = {
    id: '',
    title: '',
    description: '',
    image: '',
    price: ''
}

const products = computed(() => store.state.product.products);

const productModel = ref({...DEFAULT_PRODUCT})
const showProductModal = ref(false);

function showAddNewModal() {
    showProductModal.value = true
}

function editProduct(product) {
    store.dispatch('product/getProduct', product.id)
        .then(({data}) => {
            productModel.value = data
            showAddNewModal();
        })
}

function onModalClose() {
    productModel.value = {...DEFAULT_PRODUCT}
}
</script>


<style scoped>

</style>
