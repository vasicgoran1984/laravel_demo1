<template>
    <div class="top-16 w-72">
        <Combobox v-model="selectedCar">
            <div class="relative mt-1">
                <div
                    class="relative w-full cursor-default overflow-hidden rounded-lg bg-white text-left shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75 focus-visible:ring-offset-2 focus-visible:ring-offset-teal-300 sm:text-sm"
                >
                    <ComboboxInput
                        class="w-full border-none py-2 pl-3 pr-10 text-sm leading-5 text-gray-700 focus:ring-0"
                        :displayValue="(car) => car.chassis_number"
                        @change="query = $event.target.value"
                        placeholder="Traži po šasiji..."
                    />
                    <ComboboxButton
                        class="absolute inset-y-0 right-0 flex items-center pr-2"
                    >
                    </ComboboxButton>
                </div>
                <TransitionRoot
                    leave="transition ease-in duration-100"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                    @after-leave="query = ''"
                >
                    <ComboboxOptions
                        class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm"
                    >
                        <div
                            v-if="filteredCars.length === 0 && query !== ''"
                            class="relative cursor-default select-none px-4 py-2 text-gray-300"
                        >
                            Nema rezultata....
                        </div>

                        <ComboboxOption
                            v-for="car in filteredCars"
                            as="template"
                            :key="car.id"
                            :value="car"
                            v-slot="{ selectedCar, active }"
                        >
                            <li
                                class="relative cursor-default select-none py-2 pl-10 pr-4"
                                :class="{
                  'bg-gray-600 text-white': active,
                  'text-gray-900': !active,
                }"
                            >
                <span
                    class="block truncate"
                    :class="{ 'font-medium': selectedCar, 'font-normal': !selectedCar }"
                >
                  {{ car.chassis_number }}
                </span>
                                <span
                                    v-if="selectedCar"
                                    class="absolute inset-y-0 left-0 flex items-center pl-3"
                                    :class="{ 'text-white': active, 'text-teal-600': !active }"
                                >
                  <CheckIcon class="h-5 w-5" aria-hidden="true" />
                </span>
                            </li>
                        </ComboboxOption>
                    </ComboboxOptions>
                </TransitionRoot>
            </div>
        </Combobox>
    </div>
</template>

<script setup>
import {ref, computed, onMounted} from 'vue'
import {
    Combobox,
    ComboboxInput,
    ComboboxButton,
    ComboboxOptions,
    ComboboxOption,
    TransitionRoot,
} from '@headlessui/vue'
import { CheckIcon } from '@heroicons/vue/solid'
import store from "../../../store/index.js";

let allCars = '';

let selectedCar = ref(allCars[0])
let query = ref('')

let filteredCars = computed(() =>
    query.value === ''
        ? allCars
        : allCars.filter((car) =>
            car.chassis_number
                .toLowerCase()
                .replace(/\s+/g, '')
                .includes(query.value.toLowerCase().replace(/\s+/g, ''))
        )
)



onMounted(() => {

    console.log('mountedddd')
    console.log(allCars)
    console.log('persons....')
    getCars();
})

// Get All Cars
function getCars(url = null) {
    store.dispatch('car/showAllCars')
        .then(({data}) => {
            console.log(data)
            allCars = data;
        })
}
</script>
