<script setup>

import {useForm} from "@inertiajs/vue3";
import {Popover, PopoverButton, PopoverOverlay, PopoverPanel} from '@headlessui/vue';


const form = useForm({
    name: '',
    description: '',
})

const props = defineProps({
    taskList: Object,
})

function onSubmit(closePopover) {
    form.post(route('boards.store', {taskList: props.taskList}), {
        onSuccess : () => {
            form.reset()
            closePopover()
        }
    })
}

</script>

<template>
    <Popover
        v-slot="{ open }"
        class="relative">
        <PopoverButton
            :class="open ? 'bg-blue-50 text-blue-600' : ''"
            class="ml-4 py-2 px-4 bg-gray-100 rounded-md font-medium hover:bg-gray-200 rounded hover:bg-gray-200"
        >
            NEW BOARD
        </PopoverButton>
        <PopoverOverlay class="z-10 bg-black opacity-30 fixed inset-0"/>

        <transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="translate-y-1 opacity-0"
            enter-to-class="translate-y-0 opacity-100"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="translate-y-0 opacity-100"
            leave-to-class="translate-y-1 opacity-0"
        >
            <PopoverPanel
                :focus="true"
                v-slot="{close}"
                class="absolute z-10 w-72 px-4 mt-3 -translate-x-1/2 left-1/2 sm:px-0"
            >
                <div
                    class="p-3 bg-white overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
                >
                    <form @submit.prevent="onSubmit(close)">
                        <label
                            class="block text-sm text-gray-600 font-medium mb-2"
                            for="name">Enter the board's name:</label>
                        <input
                            id="name"
                            v-model="form.name"
                            class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring-blue-400"
                            name="name"
                            placeholder="Board name"
                            type="text">
                        <p
                            v-if="form.errors.name"
                            class="text-sm text-red-600 my-4">{{ form.errors.name }}</p>
                        <label
                            class="block text-sm text-gray-600 font-medium mb-2"
                            for="name">Enter the board's description:</label>
                        <textarea
                            id="description"
                            v-model="form.description"
                            class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring-blue-400 resize-none mt-4"
                            name="description"
                            placeholder="Description"
                            rows="4"
                            cols="50"/>
                        <p
                            v-if="form.errors.description"
                            class="text-sm text-red-600 my-4">{{ form.errors.description }}</p>

                        <div class="flex justify-end mt-2">
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:outline-none">Create board</button>
                        </div>
                    </form>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>


</template>

<style scoped>

</style>
