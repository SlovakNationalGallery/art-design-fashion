<template>
    <app-layout title="Edit exhibition">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit exhibition
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
    props: ['exhibition'],
    data() {
        return {
            form: this.$inertia.form({
                title: this.exhibition.title,
                content: this.exhibition.content,
            })
        }
    },
    methods: {
        submit() {
            this.form.put(this.route('backend.exhibitions.update', this.exhibition.id))
        }
    },
}
</script>
