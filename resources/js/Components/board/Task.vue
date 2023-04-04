<script setup>
import { PencilSquareIcon } from "@heroicons/vue/24/solid"
import TaskEditForm from "@/Components/forms/TaskEditForm.vue";

defineProps({
    task: Object,
});


</script>

<template>
    <li class="group relative bg-white p-3 shadow border-b border-gray-300 hover:bg-gray-50 rounded-md">
        <div>
            <a class="font-bold" href="#">{{task.name}}</a>
            <p class="text-sm pt-2">{{task.description}}</p>
        </div>
        <TaskEditForm :task="task"/>
    </li>
</template>

<style scoped>

</style>
