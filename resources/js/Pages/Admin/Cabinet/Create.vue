<template>
    <app-layout title="Create cabinet">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create cabinet
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
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                content: '',
                location: '',
                exhibition_id: null,
                images: null,
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('admin.cabinets.store'))
        }
    },
}
</script>
