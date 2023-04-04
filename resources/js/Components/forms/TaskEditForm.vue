<script setup>

import {nextTick, ref} from "vue";
import {useForm} from "@inertiajs/vue3";
import {PencilSquareIcon} from "@heroicons/vue/24/solid"


const props = defineProps({
    task: Object
});

const nameInputRef = ref();
const isShowingForm = ref(false);

const form = useForm({
    name: props.task.name,
    description: props.task.description,
});

async function showForm() {
    isShowingForm.value = true;
    await nextTick();
    nameInputRef.value.focus();
}

function onSubmit() {
    form.put(route('tasks.update', {task: props.task.id}), {
        onSuccess: () => isShowingForm.value = false
    });
}
</script>

<template>
    <li>
        <form
            v-if="isShowingForm"
            @keydown.esc="isShowingForm = false"
            @submit.prevent="onSubmit()"
            class="bg-gray-300 p-5 rounded-md"
        >

            <label
                class="block text-sm text-gray-600 font-medium mb-2"
                for="name">Enter the Task's new name:</label>
            <input
                ref="nameInputRef"
                id="name"
                v-model="form.name"
                class="block w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring-blue-400"
                name="name"
                placeholder="Task's name"
                type="text">
            <p
                v-if="form.errors.name"
                class="text-sm text-red-600 my-4">{{ form.errors.name }}</p>
            <label
                class="mt-4 block text-sm text-gray-600 font-medium mb-2"
                for="name">Enter the Task's new description:</label>
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


            <div class="mt-2 space-x-2">
                <button
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:outline-none"
                    type="submit"
                >Save card
                </button>
                <button
                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-black rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
                    type="button"
                    @click="isShowingForm = false"
                >Cancel
                </button>
            </div>
        </form>


        <button
            class="hidden w-8 h-8 absolute top-1 right-1 px-2 group-hover:block text-gray-500 hover:text-black hover:bg-gray-100 rounded-md"
            @click="showForm()"
            v-if="!isShowingForm"
        >
            <PencilSquareIcon/>
        </button>
    </li>
</template>
