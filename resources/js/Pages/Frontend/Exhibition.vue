<template>
    <frontend-layout>
        <template #nav>{{ resource.exhibition.title }}</template>
        <template #content>{{ resource.exhibition.content }}</template>

        <div v-masonry="masonry" item-selector="[data-masonry-tile]" transition-duration="0" class="mx-[-.5vw]">
            <div v-masonry-tile class="px-[.5vw] py-[1vw] w-1/4" v-for="cabinet in resource.exhibition.cabinets" :key="cabinet.id" data-masonry-tile>
                <a class="block" :href="route('cabinets.show', cabinet.id)">
                    <div class="bg-gray-500 mb-[.5vw]" v-if="cabinet.images.length">
                        <img class="w-full" :srcset="cabinet.images[0].srcset" :src="cabinet.images[0].url">
                    </div>
                    <div class="font-bold uppercase">{{ cabinet.title }}</div>
                </a>
            </div>
        </div>
    </frontend-layout>
</template>

<script>
import FrontendLayout from '@/Layouts/FrontendLayout.vue'

export default {
    components: { FrontendLayout },
    props: ['resource'],
}
</script>