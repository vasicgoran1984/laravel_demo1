<template>
    <div class="relative">
        <Combobox v-model="internalSelected">
            <div class="relative mt-1">
                <div class="relative w-full cursor-default overflow-hidden border-none bg-gray-500 text-white bg-gray text-left shadow-md focus:outline-none sm:text-sm">
                    <ComboboxInput
                        class="w-full border-none py-2 pl-3 pr-10 text-sm leading-5 text-white"
                        placeholder="Izaberite servisera"
                        :displayValue="(person) => person ? person.first_name + ' ' + person.last_name : ''"
                        @input="query = $event.target.value"

                    />
                    <ComboboxButton class="absolute inset-y-0 right-0 flex items-center pr-2">
                        <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M7 7l3-3 3 3m0 6l-3 3-3-3"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </ComboboxButton>
                </div>

                <TransitionRoot leave="transition ease-in duration-100" leave-from="opacity-100" leave-to="opacity-0">
                    <ComboboxOptions
                        class="absolute z-50 mt-1 max-h-60 w-full overflow-auto bg-white py-1 text-base shadow-lg focus:outline-none sm:text-sm"
                    >
                        <div v-if="filteredMechanics.length === 0 && query !== ''" class="relative cursor-default select-none px-4 py-2 text-gray-200">
                            Nema rezultata
                        </div>

                        <ComboboxOption
                            v-for="mechanic in filteredMechanics"
                            :key="mechanic.id"
                            :value="mechanic"
                            v-slot="{ selected: isSelected, active }"
                        >
                            <li
                                :class="[
                  'relative cursor-pointer select-none py-2 pl-10 pr-4',
                  active ? 'bg-gray-600 text-white' : 'text-gray-700'
                ]"
                            >
                <span :class="[isSelected ? 'font-medium' : 'font-normal']">
                  {{ mechanic.first_name }} {{ mechanic.last_name }}
                </span>

                                <span
                                    v-if="isSelected"
                                    class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-600"
                                >
                  <CheckIcon class="h-5 w-5" aria-hidden="true" />
                </span>
                            </li>
                        </ComboboxOption>
                    </ComboboxOptions>
                </TransitionRoot>
            </div>
        </Combobox>
        <p v-if="errors" class="text-red-500 text-sm mt-1">
            {{ Array.isArray(errors) ? errors[0] : errors }}
        </p>
    </div>
</template>

<script setup>
import { ref, computed, watch, onMounted } from 'vue'
import { Combobox, ComboboxInput, ComboboxButton, ComboboxOptions, ComboboxOption, TransitionRoot } from '@headlessui/vue'
import { CheckIcon } from '@heroicons/vue/solid'
import store from '../../store/index.js'

const props = defineProps({
    modValue: Object,
    errors: [String, Array],
})

const emit = defineEmits(['update:modValue'])

const query = ref('')
const mechanics = ref([])
const internalSelected = ref(props.modValue || null)

watch(() => props.modValue, (val) => {
    internalSelected.value = val
})

watch(internalSelected, (val) => {
    emit('update:modValue', val)
})

const filteredMechanics = computed(() => {
    if (!query.value) return mechanics.value
    return mechanics.value.filter((mechanic) =>
        `${mechanic.first_name} ${mechanic.last_name}`.toLowerCase().includes(query.value.toLowerCase())
    )
})

onMounted(() => {
    store.dispatch('mechanic/getAllMechanics').then(({ data }) => {
        mechanics.value = data
    })
})
</script>
