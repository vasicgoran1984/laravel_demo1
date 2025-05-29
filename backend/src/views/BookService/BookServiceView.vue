<template>
    <div class="bg-white px-4 pt-5 pb-4 py-2 mt-2 mb-4">
        <h1 class="text-2xl font-semibold pb-2">Servisna Knjiga</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
        <div class="animate-fade-in-down bg-white shadow flex flex-col" style="animation-delay: 0.1s">
            <div v-if="!loading" class="bg-white px-4 pt-5 pb-4">
                <h1 class="text-2xl font-semibold pb-2">{{ ownerTitle }}</h1>
                <hr class="mb-2"/>
                <h2 class="text-[20px]"><b>Ime: </b>{{bookService.first_name}}</h2>
                <h2 class="text-[20px]"><b>Prezime: </b>{{bookService.last_name}}</h2>
                <h2 class="text-[20px]"><b>Grad: </b>{{bookService.city}}</h2>
                <h2 class="text-[20px]"><b>Telefon: </b>{{bookService.phone}}</h2>
            </div>
            <div v-else class="bg-white px-4 pt-5 pb-4 py-2">
                <Spinner class="my-4" />
            </div>
        </div>

        <div class="animate-fade-in-down bg-white rounded-lg shadow flex flex-col" style="animation-delay: 0.1s">
            <div v-if="!loading" class="bg-white px-4 pt-5 pb-4 py-2">
                <h1 class="text-2xl font-semibold pb-2">{{ carTitle }}</h1>
                <hr class="mb-2"/>
                <h2 class="text-[20px]"><b>Proizvodjač: </b>{{bookService.producer_name}}</h2>
                <h2 class="text-[20px]"><b>Model: </b>{{bookService.type_name}}</h2>
                <h2 class="text-[20px]"><b>Broj Šasije: </b>{{bookService.chassis_number}}</h2>
                <h2 class="text-[20px]"><b>Broj Tablica: </b>{{bookService.plate_number}}</h2>
                <h2 class="text-[20px]"><b>Datum: </b>{{bookService.date}}</h2>
            </div>
            <div v-else class="bg-white px-4 pt-5 pb-4 py-2">
                <Spinner class="my-4" />
            </div>
        </div>

    </div>

    <div class="bg-white px-4 pt-5 pb-4 py-2 mt-2">
        <h1 class="text-2xl font-semibold pb-2">Kilometraža</h1>
        <form @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <CustomInput class="mb-2 text-gray-700" v-model="bookUpdate.kilometers"  label="Unesite Kilometre...." />
                </div>
                <span class="text-red-600">{{emptyKm}}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-6">
                <div class="animate-fade-in-down rounded-lg bg-white shadow flex flex-col" style="animation-delay: 0.1s">
                    <div class="bg-gray-500 rounded-lg">
                        <button type="submit"
                                class="py-4 w-full text-3xl flex items-center rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-600">
                            Snimi Kilometre
                        </button>
                    </div>
                </div>

                <div class="animate-fade-in-down rounded-lg bg-white shadow flex flex-col" style="animation-delay: 0.1s">
                    <div class="bg-gray-500 rounded-lg">
                        <router-link :to="{name: 'app.CreateService', params: {bok_id: route.params.book_id}}" class="py-4 flex items-center rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-600">
                            <span class="text-3xl">
                                Servis Vozila
                            </span>
                        </router-link>
                    </div>
                </div>
            </div>

        </form>
    </div>

</template>

<script setup>


import {computed, onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute, useRouter} from "vue-router";
import CustomInput from "../../components/core/CustomImput.vue";
import Spinner from "../../components/core/Spinner.vue";
import router from "../../router/index.js";

const route = useRoute()

const ownerTitle = ref('');
const carTitle = ref('');
const loading = ref(true);
const bookService = ref({});

const bookUpdate = ref({
    book_id: route.params.book_id,
    kilometers: '',
});

const emptyKm = ref('');

onMounted(() => {
    store.dispatch('bookService/getBookServiceById', route.params.book_id)
        .then(({data}) => {
            loading.value = false;
            bookService.value = data;
        })
    ownerTitle.value = "Vlasnik";
    carTitle.value = "Vozilo";
})


function onSubmit() {
    if (!bookUpdate.value.kilometers.length > 0) {
        emptyKm.value = 'Unesite kilometre';
    } else {
        store.dispatch('bookService/insertKilometers', bookUpdate)
            .then(({data}) => {
                loading.value = false;
                store.commit('toast/showToast', `Kilometri Snimljeni!`)
                emptyKm.value = '';
                router.push({name: 'app.CreateService', params: {book_id: route.params.book_id}})
            })
    }



}

</script>

<style scoped>

</style>
