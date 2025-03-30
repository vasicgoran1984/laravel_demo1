<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="text-3xl font-semibold">Users</h1>
        <button type="button"
                @click="showAddNewModal()"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
        >
            Add new User
        </button>
    </div>
    <UserModal v-model="showUserModal" :user="userModel" @close="onModalClose" />
    <UsersTable />
</template>


<script setup>

import UsersTable from "./UsersTable.vue";
import {computed, ref} from "vue";
import store from "../../store/index.js";
import UserModal from "./UserModal.vue";

const DEFAULT_USER = {
    id: '',
    name: '',
    email: '',
    is_admin: '',
}

const user = computed(() => store.state.user.users);
const userModel = ref({...DEFAULT_USER});
const showUserModal = ref(false);

function showAddNewModal() {
    showUserModal.value = true
}

function onModalClose() {
    userModel.value = {...DEFAULT_USER}
}

</script>


<style scoped>

</style>
