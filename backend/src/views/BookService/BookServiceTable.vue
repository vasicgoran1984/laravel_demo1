<template>
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between border-b-2 pb-3">
            <div class="flex items-center">
                <span class="whitespace-nowrap mr-3">Prikaži po stranici</span>
                <select @change="getServiceBooks(null)" v-model="perPage"
                        class="appearance-none relative block w-24 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div>
                <input @change="getServiceBooks(null)" v-model="search"
                       class="appearance-none relative block w-48 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       placeholder="Traži...">
            </div>
        </div>
        <table class="table-auto w-full">
            <thead>
            <tr>
                <TableHeaderCell @click="sortServiceBook" class="border-b p-2 text-left" field="id" :sort-field="sortField"
                                 :sort-direction="sortDirection">ID
                </TableHeaderCell>
                <TableHeaderCell class="border-b p-2 text-left" field="first_name" :sort-field="sortField"
                                 :sort-direction="sortDirection">Ime
                </TableHeaderCell>
                <TableHeaderCell @click="sortServiceBook" class="border-b p-2 text-left" field="last_name" :sort-field="sortField"
                                 :sort-direction="sortDirection">Prezime
                </TableHeaderCell>
                <TableHeaderCell @click="sortServiceBook" class="border-b p-2 text-left" field="city" :sort-field="sortField"
                                 :sort-direction="sortDirection">Grad
                </TableHeaderCell>
                <TableHeaderCell class="border-b p-2 text-left" field="type_name"
                                 :sort-field="sortField" :sort-direction="sortDirection">Vozilo
                </TableHeaderCell>
                <TableHeaderCell class="border-b p-2 text-left" field="chassis_number"
                                 :sort-field="sortField" :sort-direction="sortDirection">Broj Šasije
                </TableHeaderCell>
                <TableHeaderCell field="actions">
                    Servis
                </TableHeaderCell>
                <TableHeaderCell field="actions">
                    Detalji
                </TableHeaderCell>
            </tr>
            </thead>
            <tbody v-if="!loading">
            <tr>
                <td colspan="6">
                    <Spinner class="my-4" v-if="!loading"  />
                </td>
            </tr>
            </tbody>
            <tbody v-else>
            <tr v-for="book of bookService.data" class="hover:bg-gray-100">
<!--                {{book}}-->
                <td class="border-b p-2">
                    {{book.id}}
                </td>

                <td class="border-b p-2">
                    {{book.first_name}}
                </td>

                <td class="border-b p-2">
                    {{book.last_name}}
                </td>

                <td class="border-b p-2">
                    {{book.city}}
                </td>

                <td class="border-b p-2">
                    {{book.producer_name}} {{book.type_name}}
                </td>
                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                    {{book.chassis_number}}
                </td>
                <td class="border-b p-2">
                    <button
                        :class="['group flex w-full items-center rounded-md px-2 py-2 text-sm']"
                        @click="newCarService(book.id)">
                        <KeyIcon class="mr-2 h-5 w-5 text-gray-800" aria-hidden="true"/>
                        <b>Novi</b>
                    </button>
                </td>
                <td class="border-b p-2">
                    <button
                        :class="['group flex w-full items-center rounded-md px-2 py-2 text-sm']"
                        @click="showServisByBookId(book.id)">
                        <EyeIcon class="mr-2 h-5 w-5 text-gray-800" aria-hidden="true"/>
                        <b>Pogledaj</b>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-if="loading && bookService.meta" class="flex justify-between items-center mt-5">
            <span v-if="bookService.meta.from && bookService.meta.to">
                Redova {{ bookService.meta.from }} do {{ bookService.meta.to }}
            </span>

            <nav
                v-if="bookService.meta && bookService.meta.total > bookService.meta.per_page"
                class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                aria-label="Pagination"
            >
                <a
                    v-if="bookService.links && bookService.links.prev"
                    href="#"
                    @click.prevent="getForPage(bookService.links.prev)"
                    class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                >
                    &laquo; Prethodna
                </a>

                <span
                    v-if="bookService.meta.current_page && bookService.meta.last_page"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"
                >
                  Stranica {{ bookService.meta.current_page }} od {{ bookService.meta.last_page }}
                </span>

                <a
                    v-if="bookService.links && bookService.links.next"
                    href="#"
                    @click.prevent="getForPage(bookService.links.next)"
                    class="relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                >
                    Dalje &raquo;
                </a>
            </nav>
        </div>
    </div>
</template>

<script setup>

import store from "../../store/index.js";
import {computed, onMounted, ref} from "vue";
import {BOOK_S_PER_PAGE} from "../../constants.js";
import TableHeaderCell from "../../components/core/Table/TableHeaderCell.vue";
import Spinner from "../../components/core/Spinner.vue";
import {EyeIcon, KeyIcon} from "@heroicons/vue/outline";
import router from "../../router/index.js";


const perPage = ref(BOOK_S_PER_PAGE);
const search = ref('');
const sortField = ref('updated_at');
const sortDirection = ref('asc');
const loading = ref(true)

const bookService = computed(() => store.state.bookService.bookService);

onMounted(() => {
    getServiceBooks();
})

function getServiceBooks(url = null) {
    store.dispatch('bookService/getServiceBooks', {
        url,
        sort_field: sortField.value,
        sort_direction: sortDirection.value,
        search: search.value,
        perPage: perPage.value,
    });
}


// Get Page
function getForPage(url) {
    if (!url) return;
    this.loading = true;
    try {
        getServiceBooks(url);
    } catch (error) {
        console.error('Error loading page:', error);
    } finally {
        this.loading = true;
    }
}

// Sort Service Book
function sortServiceBook(field) {
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
    getServiceBooks();
}

// Show All Services By Book Service ID
function showServisByBookId(book_id) {
    router.push({name: 'app.CarServiceDetails', params: {book_id: book_id}})
}

// Create a New Service
function newCarService(book_id) {
    router.push({name: 'app.CreateService', params: {book_id: book_id}})
}
</script>


<style scoped>

</style>
