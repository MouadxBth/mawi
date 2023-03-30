<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import BoardList from "@/Components/board/BoardList.vue";

defineProps({
    boards: Array
});

</script>

<template>
    <Head title="Boards" />

    <AuthenticatedLayout>
        <div class="h-screen bg-gray-200 pt-4 overflow-y-auto">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center mb-4 p-2">
                    <h3 class="font-semibold text-gray-700">
                        BOARDS
                    </h3>
                    <button class="ml-4 py-2 px-4 bg-gray-100 rounded-md font-medium hover:bg-gray-200">NEW BOARD</button>
                </div>
                <BoardList :boards="boards"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
