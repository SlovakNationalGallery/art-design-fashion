<template>
    <frontend-layout>
        <template #nav>{{ exhibition.title }}</template>

        <div class="flex flex-wrap -mx-[.5vw]">
            <div class="px-[.5vw] py-[1vw] w-1/4" v-for="cabinet in exhibition.cabinets" :key="`cabinet_${cabinet.id}`">
                <a class="block" :href="route('cabinet', cabinet.id)">
                    <div class="bg-gray-500" style="aspect-ratio: 4/3"></div>
                    <div class="font-bold mt-[.5vw] uppercase">{{ cabinet.title }}</div>
                </a>
            </div>
        </div>
    </frontend-layout>
</template>

<script>
import FrontendLayout from '@/Layouts/FrontendLayout.vue'

export default {
    components: { FrontendLayout },
    props: ['exhibition'],
}
</script>