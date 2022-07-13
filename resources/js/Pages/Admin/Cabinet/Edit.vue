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
import AppLayout from "@/Layouts/AppLayout.vue";
import CabinetForm from "@/Components/Backend/CabinetForm.vue";

export default {
    components: {
        AppLayout,
        CabinetForm,
    },
    props: ["resource"],
    data() {
        return {
            form: this.$inertia.form({
                title: this.resource.cabinet.title,
                content: this.resource.cabinet.content,
                location: this.resource.cabinet.location,
                exhibition_id: this.resource.cabinet.exhibition_id,
                images: this.resource.cabinet.images,
                position: this.resource.cabinet.position,
            }),
        };
    },
    methods: {
        submit() {
            this.form.put(
                this.route("admin.cabinets.update", this.resource.cabinet.id)
            );
        },
    },
};
</script>
