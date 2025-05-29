<template>
    <GuestLayout title="Registracija">
        <form class="mt-8 space-y-6" method="POST" @submit.prevent="register">
            <div v-if="errorMsg" class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded">
                {{errorMsg}}
                <span
                    @click="errorMsg = ''"
                    class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
                >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
              />
              </svg>
          </span>
            </div>
            <input type="hidden" name="remember" value="true" />

            <div>
                <div class="flex items-center justify-between">
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Ime</label>
                </div>
                <div class="mt-2">
                    <input type="text" name="first_name" id="first_name" autocomplete="first_name" v-model="user.first_name"
                           class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Ime"/>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Prezime</label>
                </div>
                <div class="mt-2">
                    <input type="text" name="last_name" id="last_name" autocomplete="last_name" v-model="user.last_name"
                           class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Prezime"/>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                </div>
                <div class="mt-2">
                    <input type="email" name="email" id="email" autocomplete="email" required="" v-model="user.email"
                           class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Email"/>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input type="password" name="password" id="password" autocomplete="current-password" required="" v-model="user.password"
                           class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Password"/>
                </div>
            </div>

            <div>
                <button type="submit"
                        :disabled="loading"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        :class="{
                  'cursor-not-allowed': loading,
                  'hover:bg-indigo-500': loading,
                }">
                    <svg
                        v-if="loading"
                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"
                        ></circle>
                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        ></path>
                    </svg>
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
                    Registracija
                </button>
            </div>
        </form>
        <div class="flex items-center justify-between">
            <div class="text-sm">
                <router-link :to="{name: 'login'}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Prijavi se
                </router-link>
            </div>
        </div>
    </GuestLayout>
</template>
<script setup>

import {LockClosedIcon} from "@heroicons/vue/solid";
import {ref} from "vue";
import GuestLayout from "../../components/GuestLayout.vue";
import store from "../../store/index.js";
import router from "../../router/index.js";

let loading = ref(false);
let errorMsg = ref('');

const user = {
    first_name: '',
    last_name: '',
    email: '',
    password: '',
}

function register() {
    loading.value = true;
    store.dispatch('user/register', user)
        .then(response => {
            loading.value = false;
            router.push({name: 'login'})
        })
        .catch(({ response }) => {
            errorMsg.value = response.data.message;
            loading.value = false;
        })
}


</script>

<style scoped>

</style>
