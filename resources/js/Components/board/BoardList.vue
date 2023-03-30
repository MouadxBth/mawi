<script setup>

import BoardCard from "@/Components/board/BoardCard.vue";

defineProps({
    boards: Array
})

</script>

<template>
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <li v-for="board in boards" :key="board.id"
            class="relative bg-blue-600 hover:bg-blue-700 rounded-md min-h-[7rem]">
            <BoardCard :id="board.id" :title="board.name"/>
        </li>
<!--        <BoardCard v-for="board in boards" :key="board.id" board='{{board}}' />-->
    </ul>
</template>

<style scoped>

</style>
