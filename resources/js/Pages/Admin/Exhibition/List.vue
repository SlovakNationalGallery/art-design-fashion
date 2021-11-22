<template>
    <app-layout title="List">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Exhibitions
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Link :href="route('admin.exhibitions.create')">Add</Link>

                    <div v-for="exhibition in exhibitions" :key="exhibition.id">
                        <div>{{ exhibition.title }}</div>
                        <div>
                            <Link :href="route('admin.exhibitions.edit', exhibition.id)">Edit</Link>
                            <Link :href="route('admin.exhibitions.destroy', exhibition.id)" method="delete">Delete</Link>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        AppLayout,
        Link,
    },
    props: ['exhibitions'],
}
</script>
