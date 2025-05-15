<template>
    <div class="bg-white mb-6 rounded-lg">
        <router-link :to="{name: 'app.producer.view'}" class="py-4 flex items-center rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-500">
                <span class="text-3xl">
                    Nazad
              </span>
        </router-link>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4">
        <div v-for="type of allTypes.data">
            <div class="animate-fade-in-down bg-white rounded-lg shadow flex flex-col items-center justify-center" style="animation-delay: 0.2s">
                <router-link :to="{name: 'app.orders'}" class="py-4 flex items-center w-full h-full rounded-lg justify-center transition-colors hover:text-white hover:bg-gray-500">
                <span class="text-3xl">
                    {{type.name}}
              </span>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script setup>


import {computed, onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute, useRouter} from "vue-router";

const router = useRouter();
const route = useRoute()

const allTypes = computed(() => store.state.type.type)

onMounted(() => {
    console.log(route.params)
    getType()
})

function getType() {
    store.dispatch('type/getTypeByProducerId', route.params.id)
    console.log('get')
}

</script>

<style scoped>

</style>
