<script setup>
import TodoCard from '@/Components/TodoCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps(['todo','errors', 'success']);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <TodoCard :todo="props.todo" :errors="props.errors" :success="props.success"/>
    </AuthenticatedLayout>
</template>
