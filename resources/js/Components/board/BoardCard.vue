<script setup>

import {Link} from '@inertiajs/vue3';
import {CogIcon} from "@heroicons/vue/24/solid"
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';


defineProps({
    id: Number,
    title: String,
    description: String,
})

</script>

<template>
    <Link :href="route('boards.show', {board: id})"
          class="bg-gray-200 hover:bg-blue-100 min-h-[7rem] max-h-[18rem] group rounded-md ">
        <li>
            <Menu as="div" class="relative z-10">
                <MenuButton
                    class="hidden w-8 h-8 px-1 absolute top-2 right-2 group-hover:block rounded-md hover:bg-blue-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black rounded-full">
                    <CogIcon class="text-black"/>
                </MenuButton>

                <transition
                    enter-active-class="transition transform duration-100 ease-out"
                    enter-from-class="opacity-0 scale-90"
                    enter-to-class="opacity-100 scale-100"
                    leave-active-class="transition transform duration-100 ease-in"
                    leave-from-class="opacity-100 scale-100"
                    leave-to-class="opacity-0 scale-90"
                >
                    <MenuItems
                        class="origin-top-left -right-24 top-9 mt-2 focus:outline-none absolute right bg-white overflow-hidden rounded-md shadow-lg border w-32">
                        <MenuItem v-slot="{active}">
                            <Link class="block px-4 py-2 text-sm text-red-700"
                                  :href="route('boards.delete', {board: id})" as="button"
                                  method="delete">Delete
                            </Link>
                        </MenuItem>
                    </MenuItems>
                </transition>
            </Menu>

            <div class="p-3 text-black text-lg font-bold">
                <span class="pr-10 capitalize">{{ title }}</span>
            </div>

            <div class="py-2 px-2">
                <textarea readonly class="text-black rounded-md bg-white border-none text-sm w-full h-48 resize-none">{{ description }}</textarea>
            </div>


        </li>
    </Link>


</template>

<style scoped>

</style>
