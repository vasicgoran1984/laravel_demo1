<template>
    client table
</template>

<script setup lang="ts">

import {onMounted, ref} from "vue";
import store from "../../store/index.js";
import {useRoute} from "vue-router";
const loading = ref(true);

const route = useRoute()

const carTitle = ref('');
const smallSTitle = ref('');
const bigSTitle = ref('');
const brakeSTitle = ref('');
const ownerTitle = ref('');
const bookService = ref({});
const currentDate = ref('');

onMounted(() => {
    showOwnerCar();
})

function showOwnerCar() {


    if (window.location.protocol === 'http:') {
        window.open(
            `http://localhost:8001/auto-servis/${route.params.book_id}`,
            '_blank' // Open in a new window.
        );
    } else {
        window.open(
            `https://servisvozila.site/export-pdf/${route.params.book_id}`,
            '_blank' // Open in a new window.
        );
    }

}

</script>


<style scoped>

</style>
