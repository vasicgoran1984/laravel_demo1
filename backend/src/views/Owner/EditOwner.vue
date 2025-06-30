<template>
    <div class="bg-white mb-6 rounded-lg">
        <a @click="$router.go(-1)" class="py-4 flex items-center rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-500">
                <span class="text-3xl">
                    Nazad
              </span>
        </a>
    </div>

    <div v-if="owner.id">
        <div class="animate-fade-in-down z-9">
            <div class="bg-white px-4 pt-5 pb-4 py-2 mt-2">
                <h1 class="text-2xl font-semibold pb-2">Izmijeni Vlasnika</h1>
                <form @submit.prevent="onSubmit">
                    <div class="bg-white px-4 pt-5 pb-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <CustomInput class="mb-2" v-model="owner.first_name" :errors="errors['first_name']" label="Ime" />
                            <CustomInput class="mb-2" v-model="owner.last_name" :errors="errors['last_name']" label="Prezime"/>
                            <CustomInput class="mb-2" v-model="owner.city" :errors="errors['city']" label="Grad"/>
                            <CustomInput class="mb-2" v-model="owner.address" :errors="errors['address']" label="Adresa"/>
                            <CustomInput class="mb-2" v-model="owner.phone" :errors="errors['phone']" label="Telefon"/>
                            <CustomInput class="mb-2" v-model="owner.email" :errors="errors['email']" label="Email"/>
                        </div>
                    </div>

                    <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Snimi
                        </button>
                    </footer>

                </form>
            </div>
        </div>
    </div>
    <div v-else class="animate-fade-in-down z-9">
        <div class="bg-white px-4 pt-5 pb-4 py-2 mt-2">
            <Spinner />
        </div>
    </div>

</template>

<script setup>

import {onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute, useRouter} from "vue-router";
import CustomInput from "../../components/core/CustomImput.vue";
import Spinner from "../../components/core/Spinner.vue";

const router = useRouter();
const route = useRoute()

const errors = ref({});
const owner = ref({});
const loading = ref(true);

onMounted(() => {
    const id = route.params.owner
    store.dispatch('owner/getOwner', id)
        .then(({data}) => {
            owner.value = data
            loading.value = false;
        })
});

function onSubmit() {

    store.dispatch('owner/updateOwner', owner.value)
        .then(response => {
            router.push({name: 'app.owners'})
            store.commit('toast/showToast', `korisnik izmijenjen!`)
        })
        .catch(({ response }) => {
            // First Name
            if (response.data.errors.first_name) {
                response.data.errors.first_name[0] = 'Ime je Obavezno polje!'
            } else {
                response.data.errors.first_name = '';
            }

            // Last Name
            if (response.data.errors.last_name) {
                response.data.errors.last_name[0] = 'Prezime je Obavezno polje!'
            } else {
                response.data.errors.last_name = '';
            }

            // First Name
            if (response.data.errors.city) {
                response.data.errors.city[0] = 'Grad je Obavezno polje!'
            } else {
                response.data.errors.city = '';
            }

            // First Name
            if (response.data.errors.address) {
                response.data.errors.address[0] = 'Adresa je Obavezno polje!'
            } else {
                response.data.errors.address = '';
            }

            // First Name
            if (response.data.errors.phone) {
                response.data.errors.phone[0] = 'Telefon je Obavezno polje!'
            } else {
                response.data.errors.phone = '';
            }

            // First Name
            if (response.data.errors.email) {
                response.data.errors.email[0] = 'Email je Obavezno polje!'
            } else {
                response.data.errors.email = '';
            }

            errors.value = response.data.errors
        })

}


</script>

<style scoped>

</style>
