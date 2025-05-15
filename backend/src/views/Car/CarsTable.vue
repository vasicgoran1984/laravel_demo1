<template>
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex justify-between border-b-2 pb-3">
            <div class="flex items-center">
                <span class="whitespace-nowrap mr-3">Prikaži po stranici</span>
                <select @change="getCars(null)" v-model="perPage"
                        class="appearance-none relative block w-24 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div>
                <input @change="getCars(null)" v-model="search"
                       class="appearance-none relative block w-48 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       placeholder="Traži...">
            </div>
        </div>
        <table class="table-auto w-full">
            <thead>
            <tr>
                <TableHeaderCell @click="sortCar" class="border-b p-2 text-left" field="id" :sort-field="sortField"
                                 :sort-direction="sortDirection">ID
                </TableHeaderCell>
                <TableHeaderCell class="border-b p-2 text-left" field="" :sort-field="sortField"
                                 :sort-direction="sortDirection">Vozilo
                </TableHeaderCell>
                <TableHeaderCell @click="sortCar" class="border-b p-2 text-left" field="" :sort-field="sortField"
                                 :sort-direction="sortDirection">Broj Šasije
                </TableHeaderCell>
                <TableHeaderCell @click="sortCar" class="border-b p-2 text-left" field="engine_number"
                                 :sort-field="sortField" :sort-direction="sortDirection">Broj Motora
                </TableHeaderCell>
                <TableHeaderCell @click="sortCar" class="border-b p-2 text-left" field="year"
                                 :sort-field="sortField" :sort-direction="sortDirection">Godina
                </TableHeaderCell>
                <TableHeaderCell @click="sortCar" class="border-b p-2 text-left" field="plate_number"
                                 :sort-field="sortField" :sort-direction="sortDirection">Broj Tablice
                </TableHeaderCell>
                <TableHeaderCell @click="sortCar" class="border-b p-2 text-left" field="updated_at"
                                 :sort-field="sortField" :sort-direction="sortDirection">Zapremina
                </TableHeaderCell>
                <TableHeaderCell field="actions">
                    Izmijeni Vozilo
                </TableHeaderCell>
            </tr>
            </thead>
            <tbody v-if="cars.loading">
            <tr>
                <td colspan="6">
                    <Spinner class="my-4" v-if="cars.loading"  />
                </td>
            </tr>
            </tbody>
            <tbody v-else>
            <tr v-for="car of cars.data" class="hover:bg-gray-100">
                <td class="border-b p-2">{{car.id}}</td>

                <td class="border-b p-2">
                    {{car.producer_name}} {{car.type_name}}
                </td>
                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                    {{car.chassis_number}}
                </td>
                <td class="border-b p-2">
                    {{car.engine_number}}
                </td>
                <td class="border-b p-2">
                    {{car.year}}
                </td>
                <td class="border-b p-2">
                    {{car.plate_number}}
                </td>
                <td class="border-b p-2">
                    {{car.volume}}
                </td>
                <td class="border-b p-2">
                    <button
                        :class="['group flex w-full items-center rounded-md px-2 py-2 text-sm']"
                        @click="editCar(car.id)">
                        <PencilIcon class="mr-2 h-5 w-5 text-gray-800" aria-hidden="true"/>
                        <b>Izmijeni</b>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-if="!cars.loading" class="flex justify-between items-center mt-5">
        <span>
          Stranica {{ cars.from }} od {{ cars.to }}
        </span>
            <nav
                v-if="cars.total > cars.limit"
                class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                aria-label="Pagination"
            >
                <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                <a
                    v-for="(link, i) of cars.links"
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
              i === cars.links.length - 1 ? 'rounded-r-md' : '',
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
import store from "../../store/index.js";
import {computed, onMounted, ref} from "vue";
import {CARS_PER_PAGE} from "../../constants.js";
import TableHeaderCell from "../../components/core/Table/TableHeaderCell.vue";
import {DotsVerticalIcon, PencilIcon, TrashIcon} from '@heroicons/vue/outline'
import Spinner from "../../components/core/Spinner.vue";

const perPage = ref(CARS_PER_PAGE);
const search = ref('');
const sortField = ref('updated_at');
const sortDirection = ref('asc');

const cars = computed(() => store.state.car.car);
const showModal = ref(false);

onMounted(() => {
    getCars();
})

// Get All Cars
function getCars(url = null) {
    store.dispatch('car/getCars', {
        url,
        sort_field: sortField.value,
        sort_direction: sortDirection.value,
        search: search.value,
        perPage: perPage.value,
    });
}

// Get Page
function getForPage(ev, link) {
    if (!link.url || link.active) {
        ev.preventDefault();
    }
    getCars(link.url);
}

// Sort Car
function sortCar(field) {
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
    getCars();
}

function editCar(car) {
    console.log(car)
    showModal.value = true;
}
</script>


<style scoped>

</style>
