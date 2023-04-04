<script setup>

import Task from "@/Components/board/Task.vue";
import { AdjustmentsHorizontalIcon } from "@heroicons/vue/24/solid";
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';
import {Link} from '@inertiajs/vue3';
import TaskForm from "@/Components/forms/TaskForm.vue";

const props = defineProps({
   taskList: Object
});

</script>

<template>
    <div class="w-72 bg-gray-200 flex flex-col rounded-md max-h-full">
        <div class="mt-3 mb-3 flex items-center justify-between p-2">
            <h3 class="text-lg font-semibold">
                {{taskList.name}}
            </h3>

            <Menu as="div" class="relative z-10">
                <MenuButton class="hover:bg-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black rounded-full">
                    <AdjustmentsHorizontalIcon class="w-8 h-8 px-1"/>
                </MenuButton>

                <transition
                    enter-active-class="transition transform duration-100 ease-out"
                    enter-from-class="opacity-0 scale-90"
                    enter-to-class="opacity-100 scale-100"
                    leave-active-class="transition transform duration-100 ease-in"
                    leave-from-class="opacity-100 scale-100"
                    leave-to-class="opacity-0 scale-90"
                >
                    <MenuItems class="origin-top-left mt-2 focus:outline-none absolute left bg-white overflow-hidden rounded-md shadow-lg border w-32">
                        <MenuItem v-slot="{active}">
                            <Link :class="{'bg-gray-100': active}" class="block px-4 py-2 text-sm text-red-700"
                                  :href="route('list.delete', {list: taskList.id})" as="button"
                                  method="delete">Delete
                            </Link>
                        </MenuItem>
                    </MenuItems>
                </transition>
            </Menu>
        </div>
        <div class="pb-3 flex flex-col overflow-hidden">
            <div class="px-3 flex-1 overflow-y-auto" >
                <ul class="space-y-2">
                    <Task v-for="item in taskList.tasks" :id="item.id" :task="item"/>
                </ul>
            </div>
            <div class="p-2">
                <TaskForm :list="taskList"/>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
