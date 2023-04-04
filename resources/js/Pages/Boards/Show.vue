<script setup>

import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TaskList from "@/Components/board/TaskList.vue";

import {CogIcon} from "@heroicons/vue/24/solid";
import TaskListForm from "@/Components/forms/TaskListForm.vue";
import BoardNameForm from "@/Components/forms/BoardNameForm.vue";

defineProps({
    board: Object,
})

</script>

<template>
    <Head title="Board"/>

    <AuthenticatedLayout>
        <!--CONTENT-->
        <div class="flex-1 bg-gray-300 h-full overflow-y-auto">
<!--            BOARD CONTENT-->
            <div class="flex flex-col h-full">
<!--                TITLE AND SETTINGS-->
                <div class="shrink-0 flex justify-between items-center p-3">
                    <BoardNameForm :board="board" />
                </div>
<!--                TASK LISTS-->
                <div class="flex-1 overflow-x-auto">
                    <div class="inline-flex h-full items-start px-4 pb-4 space-x-4">

                        <TaskList v-for="item in board.task_lists" :id="item.id" :task-list="item"/>
                        <div class="w-72">
                            <TaskListForm :board="board" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
