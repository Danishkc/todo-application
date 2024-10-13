<template>
    <div v-if="show" class="modal fade show" style="display: block;" tabindex="-1" role="dialog" ref="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ isEdit ? 'Edit Task' : 'Create Task' }}</h5>
                    <button type="button" class="close" @click="closeModal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="todo">Todo</label>
                        <input type="text" class="form-control" id="todo" v-model="form.todo" />
                        <span v-if="errors.todo" class="text-danger">{{ errors.todo }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
                    <button type="button" class="btn btn-primary" @click="submit">{{ isEdit ? 'Update' : 'Save' }}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps(['show', 'form', 'errors', 'isEdit']);
const emit = defineEmits(['close', 'submit']);

function closeModal() {
    emit('close');
}

function submit() {
    emit('submit');
}
</script>
