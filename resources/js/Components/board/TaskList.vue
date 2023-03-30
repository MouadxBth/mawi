<script setup>

import Task from "@/Components/board/Task.vue";

defineProps({
   title: String
});

</script>

<template>
    <div class="w-72 bg-gray-200 flex flex-col rounded-md max-h-full">
        <div class="inline-flex text-center pt-2 px-2">
            <p class="text-xs">CREATED AT: 2002/12/17</p>
            <p class="text-xs">UPDATED AT: 2002/12/17</p>
        </div>
        <div class="mt-3 mb-3 flex items-center justify-between p-2">
            <h3 class="text-lg font-semibold">
                {{title}}
            </h3>
            <button class="hover:bg-gray-300 rounded-md">
                OPTIONS
            </button>
        </div>
        <div class="pb-3 flex flex-col overflow-hidden">
            <div class="px-3 flex-1 overflow-y-auto">
                <ul class="space-y-2">
                    <Task v-for="item in Array.from({length: 10})"/>
                </ul>
            </div>

            <div>
                <button class="p-2 text-gray-600 hover:bg-gray-100 hover:text-black w-full font-medium text-sm rounded-md mt-3">
                    ADD CARD
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
