<script setup>

import BoardCard from "@/Components/board/BoardCard.vue";

defineProps({
    boards: Array
})

</script>

<template>
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <BoardCard v-for="board in boards" :key="board.id" :id="board.id" :title="board.name" :description="board.description"/>
    </ul>
</template>

<style scoped>

</style>
