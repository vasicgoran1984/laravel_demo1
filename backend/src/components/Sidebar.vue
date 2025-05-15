<template>
    <div class="w-[200px] transition-all bg-gray-600 text-white p-4 px-2">
        <router-link :to="{name: 'app.dashboard'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
      <span class="mr-2 text-gray-300">
        <HomeIcon class="w-5" />
      </span>
            <span class="text-1xl">
        <b>Početak</b>
      </span>
        </router-link>
        <router-link :to="{name: 'app.cars'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
      <span class="mr-2 text-gray-300">
        <ViewListIcon class="w-5" />
      </span>
            <span class="text-1xl">
        Lista Vozila
      </span>
        </router-link>
        <router-link :to="{name: 'app.owners'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
      <span class="mr-2 text-gray-300">
        <UserGroupIcon class="w-5" />
      </span>
            <span class="text-1xl">
        Lista Vlasnika
      </span>
        </router-link>
        <router-link :to="{name: 'app.owner.cars'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
      <span class="mr-2 text-gray-300">
        <PencilIcon class="w-5" />
      </span>
            <span class="text-1xl">
        Vlasnisi Vozila
      </span>
        </router-link>
        <router-link :to="{name: 'app.cars'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
          <span class="mr-2 text-gray-300">
            <BookOpenIcon class="w-5" />
          </span>
            <span class="text-1xl">
            Radni Nalog
          </span>
        </router-link>
        <router-link :to="{name: 'app.cars'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
          <span class="mr-2 text-gray-300">
            <KeyIcon class="w-5" />
          </span>
                <span class="text-1xl">
            Servisi
          </span>
        </router-link>
        <router-link :to="{name: 'app.products'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
      <span class="mr-2 text-gray-300">
        <ViewListIcon class="w-5" />
      </span>
            <span class="text-xs">
        Products
      </span>
        </router-link>
        <router-link :to="{name: 'app.orders'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
      <span class="mr-2 text-gray-300">
        <ViewListIcon class="w-5" />
      </span>
            <span class="text-xs">
        Orders
      </span>
        </router-link>
        <router-link :to="{name: 'app.users'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
      <span class="mr-2 text-gray-300">
        <UsersIcon class="w-5" />
      </span>
            <span class="text-xs">
        Users
      </span>
        </router-link>
        <router-link :to="{name: 'app.customers'}"
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
      <span class="mr-2 text-gray-300">
        <UserGroupIcon class="w-5" />
      </span>
            <span class="text-xs">
        Customers
      </span>
        </router-link>
        <router-link to=""
                     class="flex items-center p-2 transition-colors hover:bg-black/30">
      <span class="mr-2 text-gray-300">
        <ChartBarIcon class="w-5" />
      </span>
            <span class="text-xs">
        Reports
      </span>
        </router-link>
    </div>
</template>


<script setup>
import {HomeIcon, UsersIcon, ViewListIcon, ChartBarIcon, UserGroupIcon, PencilIcon, KeyIcon, BookOpenIcon} from "@heroicons/vue/solid";
</script>

<style scoped>

</style>
