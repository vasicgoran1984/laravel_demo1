<template>
    <div class="animate-fade-in-down z-9">
        <div v-if="!loading" class="bg-white px-4 pt-5 pb-4 py-2">
            <h1 class="text-2xl font-semibold pb-2">Podaci o Vlasniku</h1>
            <h2><b>Ime: </b>{{owner.first_name}}</h2>
            <h2><b>Prezime: </b>{{owner.last_name}}</h2>
            <h2><b>Grad: </b>{{owner.city}}</h2>
            <h2><b>Telefon: </b>{{owner.phone}}</h2>
        </div>
        <div v-else class="bg-white px-4 pt-5 pb-4 py-2">
            <Spinner class="my-4" />
        </div>

        <div class="bg-white px-4 pt-5 pb-4 py-2 mt-2">
            <h1 class="text-2xl font-semibold pb-2">Pretraga</h1>
            <div class="bg-white px-4 pt-5 pb-4">
                <div>
                    <input @change="getCarsOfThisService(null)" v-model="search"
                           class="appearance-none relative block w-96 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Traži po šasiji...">
                </div>
                <form @submit.prevent="">
                    <table class="table-auto w-full mt-9">
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
                            <TableHeaderCell class="border-b p-2 text-left" field="updated_at">Zapremina
                            </TableHeaderCell>
                            <TableHeaderCell field="actions">
                                Servisna Knjiga
                            </TableHeaderCell>
                        </tr>
                        </thead>
                        <tbody v-if="carsOfServices.loading">
                        <tr>
                            <td colspan="6">
                                <Spinner class="my-4" v-if="carsOfServices.loading"  />
                            </td>
                        </tr>
                        </tbody>
                        <tbody v-else>
                        <tr v-for="car of carsOfServices.data" class="hover:bg-gray-100">
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
                                <div v-if="!car.items.length > 0">
                                    <button
                                        class="mt-3 w-full flex-col items-center inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        @click="AddCarToOwner(car.id, owner.id)"
                                    >
                                        <b>Otvori</b>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
                <div v-if="1" class="flex justify-between items-center mt-5">
                <span>
                  Redova {{ carsOfServices.from }} od {{ carsOfServices.to }}
                </span>
                    <nav
                        v-if="carsOfServices.total > carsOfServices.limit"
                        class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                        aria-label="Pagination"
                    >
                        <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                        <a
                            v-for="(link, i) of carsOfServices.links"
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
                                  i === carsOfServices.links.length - 1 ? 'rounded-r-md' : '',
                                  !link.url ? ' bg-gray-100 text-gray-700': ''
                                ]"
                            v-html="link.label"
                        >
                        </a>
                    </nav>
                </div>
            </div>

            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <a @click="$router.go(-1)" class="mt-3 cursor-pointer w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    <span class="text-1xl">
                        Nazad
                  </span>
                </a>
            </footer>
        </div>
    </div>
</template>

<script setup>

import store from "../../store/index.js";
import {useRoute} from "vue-router";
import {computed, onMounted, ref} from "vue";
import Spinner from "../../components/core/Spinner.vue";
import TableHeaderCell from "../../components/core/Table/TableHeaderCell.vue";
import {CARS_PER_PAGE} from "../../constants.js";
import router from "../../router/index.js";

const perPage = ref(CARS_PER_PAGE);
const search = ref('');
const sortField = ref('updated_at');
const sortDirection = ref('asc');

const route = useRoute()

const carsOfServices = computed(() => store.state.car.car);
const owner = ref({});
const loading = ref(true);

onMounted(() => {
    store.dispatch('owner/getOwner', route.params.id)
        .then(({data}) => {
            owner.value = data
            loading.value = false;
        })
    getCarsOfThisService()
});

// Get All Cars Of This Service
function getCarsOfThisService(url = null) {
    store.dispatch('car/getCarsToAddOwner', {
        url,
        sort_field: sortField.value,
        sort_direction: sortDirection.value,
        search: search.value,
        perPage: perPage.value,
    });
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
    getCarsOfThisService();
}


// Get Page
function getForPage(ev, link) {
    if (!link.url || link.active) {
        ev.preventDefault();
    }
    getCarsOfThisService(link.url);
}

// Add Car To Owner
function AddCarToOwner(car, owner) {
    let ownerCar = ({
            car_id: car,
            owner_id: owner,
    });

    store.dispatch('bookService/createBookService', ownerCar)
        .then(response => {
            if (response.status === 200) {
                router.push({name: 'app.BookService.view', params: {book_id: response.data.bookService.id}})
            }
            store.commit('toast/showToast', `Servisna Knjiga Otvorena!`)
        }).catch(({response}) => {
            console.log(response)
    })

}
</script>

<style scoped>

</style>
