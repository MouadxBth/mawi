<script setup>

import { Link } from '@inertiajs/vue3';

defineProps({
  id: Number,
  title: String
})

</script>

<template>
  <Link :href="route('boards.show', {board: id})" class="p-3 absolute inset-0 text-white text-lg font-bold">
    {{ title }}
  </Link>
</template>

<style scoped>

</style>
