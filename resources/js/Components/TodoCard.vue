<template>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card" style="width: 500px;">
            <div class="card-header">
                <h2 class="text-center">Todo</h2>
            </div>
            <div class="card-body">
                <div v-if="success" class="alert alert-success">
                    <button type="button" class="close" @click="clearSuccess" aria-hidden="true">&times;</button>
                    {{ success }}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button @click="openModal(false, null)" class="btn btn-primary float-right">+ Create New</button>
                    </div>
                </div>
                <ul class="list-group mt-3">
                    <li v-for="todo in todo" :key="todo.id"
                        class="list-group-item d-flex justify-content-between align-items-center">
                        {{ todo.todo }}
                        <div>
                            <span class="badge badge-secondary badge-pill mr-3">
                                <i class="fas fa-edit" @click="openModal(true, todo)" style="cursor: pointer;"></i>
                            </span>
                            <span class="badge badge-secondary badge-pill">
                                <i class="fas fa-times" style="cursor: pointer;" @click="deleteTask(todo.id)"></i>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <TodoModal :show="showModal" :errors="props.errors" :isEdit="isEdit" :form="form" @close="closeModal" @submit="submit" />
</template>

<script setup>
import { ref } from 'vue';
import TodoModal from './TodoModal.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps(['todo', 'errors','success']);

const showModal = ref(false);
const isEdit = ref(false);
const currentTodo = ref(null); 

const form = useForm({
    id: null,  
    todo: ''   
});

function openModal(editMode, task) {
    isEdit.value = editMode;

    if (editMode && task) {
        form.id = task.id;
        form.todo = task.todo; 
    } else {
        form.id = null;
        form.todo = ''; 
    }

    showModal.value = true;
}

function closeModal() {
    showModal.value = false;
}

function submit() {
    if (isEdit.value) {
        form.put(route('todo.update', form.id), {
            onSuccess: () => closeModal()
        });
    } else {
        form.post(route('todo.store'), {
            onSuccess: () => closeModal()
        });
    }
}

function deleteTask(id) {
    if (confirm('Are you sure you want to delete this task?')) {
        form.delete(route('todo.destroy', id), {
            onSuccess: () => closeModal()
        });
    }
}
</script>
