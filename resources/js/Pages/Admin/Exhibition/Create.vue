<template>
    <app-layout title="Create exhibition">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create exhibition
            </h2>
        </template>

        <ExhibitionForm :form="form" @submit="submit" />
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ExhibitionForm from '@/Components/Backend/ExhibitionForm.vue'

export default {
    components: {
        AppLayout,
        ExhibitionForm,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                content: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('admin.exhibitions.store'))
        }
    },
}
</script>
