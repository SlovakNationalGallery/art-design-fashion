<template>
    <app-layout title="List">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cabinets
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


                    <Link :href="route('admin.cabinets.create')" class="btn mb-4">Add</Link>

                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr v-for="cabinet in cabinets" :key="cabinet.id">
                                                    <td class="px-6 py-4 whitespace-nowrap w-1/2">
                                                        <div class="flex items-start">
                                                            <div class="ml-4">
                                                                <div class="text-md font-medium text-gray-900">
                                                                    <Link :href="route('admin.cabinets.edit', cabinet.id)">{{ cabinet.title }}</Link>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        {{ cabinet.location }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <Link :href="route('admin.exhibitions.edit', cabinet.exhibition.id)">{{ cabinet.exhibition.title }}</Link>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <!-- <a href="{{ route('admin.articles.edit', $article) }}" class="text-indigo-600 hover:text-indigo-900">Upraviť</a> -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div v-for="cabinet in cabinets" :key="cabinet.id">
                        <div>{{ cabinet.title }}</div>
                        <div>
                            <Link :href="route('admin.cabinets.edit', cabinet.id)">Edit</Link>
                            <Link :href="route('admin.cabinets.destroy', cabinet.id)" method="delete">Delete</Link>
                        </div>
                    </div> -->

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
    props: ['cabinets'],
}
</script>
