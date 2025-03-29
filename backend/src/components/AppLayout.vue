<template>
    <div v-if="currentUser.id" class="min-h-full bg-gray-200 flex">
        <!-- Sidebar -->
        <Sidebar :class="{'-ml-[200px]' : !sidebarOpen}" />
        <!--/ Sidebar -->
        <div class="flex-1">
            <Navbar @toggle-sidebar="toggleSidebar"></Navbar>
            <!-- Content -->
            <main class="p-6">
                <router-view></router-view>
            </main>
            <!-- / Content -->
        </div>
    </div>
    <div v-else class="min-h-full bg-gray-200 flex items-center justify-center">
        <Spinner />
    </div>
</template>

<script setup>
import Sidebar from "./Sidebar.vue";
import Navbar from "./Navbar.vue";
import store from "../store/index.js";
import {computed, onMounted, onUnmounted, ref} from "vue";
import Spinner from "./core/Spinner.vue";

const sidebarOpen = ref(true);
const currentUser = computed(() => store.state.user.user.data)

function toggleSidebar() {
    sidebarOpen.value = !sidebarOpen.value;
}

onMounted(() => {
    store.dispatch('user/getCurrentUser')
    handleSidebarOpened()
    window.addEventListener('resize', handleSidebarOpened)
})

onUnmounted(() => {
    window.removeEventListener('resize', handleSidebarOpened)
})

function handleSidebarOpened() {
    sidebarOpen.value = window.outerWidth > 768;
}

</script>

<style scoped>

</style>
