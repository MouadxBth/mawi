<script setup>

import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TaskList from "@/Components/board/TaskList.vue";

</script>

<template>
    <Head title="Board"/>

    <AuthenticatedLayout>
        <!--CONTENT-->
        <div class="flex-1 bg-gray-300 h-screen overflow-hidden">
<!--            BOARD CONTENT-->
            <div class="flex flex-col h-full">
<!--                TITLE AND SETTINGS-->
                <div class="shrink-0 flex justify-between items-center p-3">
                    <h1 class="text-2xl text-white font-bold">TITLE</h1>
                    <div>
                        <button class="bg-white/10 hover:bg-white/20 px-3 py-3
                        font-medium text-sm text-white rounded-md">
                            Settings
                        </button>
                    </div>
                </div>
<!--                TASK LISTS-->
                <div class="flex-1 overflow-x-auto">
                    <div class="inline-flex h-full items-start px-4 pb-4 space-x-4">

                        <TaskList v-for="item in Array.from({length: 10})" title="MOUAD"/>
                        <div class="w-72">
                            <button class="bg-white/10 w-full hover:bg-white/20 text-white p-2 text-sm font-medium rounded-md">
                                ADD TASK LIST
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
