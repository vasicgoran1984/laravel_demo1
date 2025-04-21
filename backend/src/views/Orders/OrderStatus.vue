<template>
<span class="text-white py-1 px-2 rounded"
      :class="{
            'bg-emerald-500': ['paid', 'complete'].includes(order.status),
            'bg-red-500': order.status === 'cancelled',
            'bg-orange-500': order.status === 'unpaid',
            'bg-blue-500': order.status === 'shipped',
        }">
    {{order.status}}
</span>
</template>

<script setup>
    const {order} = defineProps({
        order: Object
    })
</script>
