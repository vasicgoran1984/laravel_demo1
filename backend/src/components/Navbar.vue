<template>
    <header class="flex justify-between items-center p-3 h-14 shadow bg-white">
        <button @click="emit('toggle-sidebar')" class="flex items-center justify-center rounded transition-colors w-8 h-8 text-gray-700 hover:bg-black/10">
            <MenuIcon class="w-6"/>
        </button>
        <Menu as="div" class="relative inline-block text-left z-10">
            <MenuButton class="flex items-center">
                <div class="mr-2">
                    {{serviceName.name_service}}
                </div>

                <img src="https://randomuser.me/api/portraits/men/1.jpg" class="rounded-full w-8 mr-2">
                <small>{{currentUser.name}}</small>
                <ChevronDownIcon
                    class="h-5 w-10 text-gray-700 hover:text-indigo-100"
                    aria-hidden="true"
                />
            </MenuButton>

                <transition
                    enter-active-class="transition duration-100 ease-out"
                    enter-from-class="transform scale-95 opacity-0"
                    enter-to-class="transform scale-100 opacity-100"
                    leave-active-class="transition duration-75 ease-in"
                    leave-from-class="transform scale-100 opacity-100"
                    leave-to-class="transform scale-95 opacity-0"
                >
                <MenuItems
                    class="absolute right-0 mt-2 w-36 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                >
                    <div class="px-1 py-1">
                        <MenuItem v-slot="{ active }">
                            <button
                                @click="service"
                                :class="[
                  active ? 'bg-gray-600 text-white' : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]"
                            >
                                <UserIcon
                                    :active="active"
                                    class="mr-2 h-5 w-5 text-gray-700"
                                    aria-hidden="true"
                                />
                                Servis
                            </button>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                            <button
                                @click="logout"
                                :class="[
                  active ? 'bg-gray-600 text-white' : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]"
                            >
                                <LogoutIcon
                                    :active="active"
                                    class="mr-2 h-5 w-5 text-gray-700"
                                    aria-hidden="true"
                                />
                                Odjava
                            </button>
                        </MenuItem>
                    </div>

                </MenuItems>
            </transition>
        </Menu>
    </header>
</template>

<script setup>
import {MenuIcon, LogoutIcon, UserIcon} from "@heroicons/vue/outline";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import {ChevronDownIcon} from "@heroicons/vue/solid";
import store from "../store/index.js";
import router from "../router/index.js";
import {computed, onMounted, ref} from "vue";

const emit = defineEmits(['toggle-sidebar'])
const currentUser = computed(() => store.state.user.user.data)

const user = store.state.user.user.data;
const serviceName = ref({});

function service() {
    router.push({name: 'app.service.view'})
}
function logout() {
    store.dispatch('user/logout')
        .then(() => {
            router.push({name: 'login'})
        })
}

onMounted(() => {
    store.dispatch('service/getService', user.id)
        .then(({data}) => {
            store.dispatch('service/getServiceByServiceId', data.id)
            if (data) {
                serviceName.value = data;
            }
        })
})

</script>

<style scoped>

</style>
