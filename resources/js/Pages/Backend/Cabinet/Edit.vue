<template>
    <app-layout title="Edit cabinet">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit cabinet
            </h2>
        </template>

        <CabinetForm :form="form" @submit="submit" />
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import CabinetForm from '@/Components/Backend/CabinetForm.vue'

export default {
    components: {
        AppLayout,
        CabinetForm,
    },
    props: ['cabinet'],
    data() {
        return {
            form: this.$inertia.form({
                title: this.cabinet.title,
                content: this.cabinet.content,
                location: this.cabinet.location,
                exhibition_id: this.cabinet.exhibition_id,
            })
        }
    },
    methods: {
        submit() {
            this.form.put(this.route('backend.cabinets.update', this.cabinet.id))
        }
    },
}
</script>
