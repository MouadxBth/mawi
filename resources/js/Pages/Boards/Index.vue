<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import BoardForm from "@/Components/forms/BoardForm.vue";
import BoardCard from "@/Components/board/BoardCard.vue";

defineProps({
    boards: Array
});

</script>

<template>
    <Head title="Boards" />

    <AuthenticatedLayout>
        <div class="bg-gray-300 pt-4 h-full overflow-y-auto pb-5">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center justify-between mb-4 p-2">
                    <h3 class="font-semibold text-gray-700">
                        BOARDS:
                    </h3>

                    <BoardForm />

                </div>
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <BoardCard v-for="board in boards" :key="board.id" :id="board.id" :title="board.name" :description="board.description"/>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
