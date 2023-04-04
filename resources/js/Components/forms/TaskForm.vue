<script setup>

import {router, useForm} from "@inertiajs/vue3";
import {nextTick, ref} from "vue";

const props = defineProps({
    list: Object,
})

const form = useForm({
    name: '',
    description: '',
    task_list : props.list.id,
})

const isFormVisible = ref(false)

const nameInputRef = ref()

async function showForm() {
    isFormVisible.value = true
    await nextTick()
    nameInputRef.value.focus();
    console.log(props.list)
}

function onSubmit() {
    form.post(route('tasks.store'),  {
        onSuccess : () => {
            form.reset()
            nameInputRef.value.focus()
        },
    })
}

function onCancel() {
    form.reset()
    isFormVisible.value = false
}

</script>

<template>
    <form v-if="isFormVisible" class="bg-gray-300 rounded-md p-3"
          @keydown.esc="isFormVisible=false"
          @submit.prevent="onSubmit()"
          >
        <label
            class="block text-sm text-gray-600 font-medium mb-2"
            for="name">Enter the Task's name:</label>
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
            for="name">Enter the Task's description:</label>
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

        <div class="flex justify-between mt-2">
            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:outline-none">
                CREATE
            </button>
            <button type="button"
                @click="onCancel()"
                class="px-4 py-2 text-sm font-medium text-white bg-gray-400 hover:bg-gray-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 focus:outline-none">
                CANCEL
            </button>
        </div>
    </form>
    <button v-if="!isFormVisible"
        @click="showForm()"
            class="p-2 text-gray-600 hover:bg-gray-100 hover:text-black w-full font-medium text-sm rounded-md mt-3">
        ADD TASK
    </button>
</template>

<style scoped>

</style>
