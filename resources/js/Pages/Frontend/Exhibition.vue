<template>
    <frontend-layout>
        <template #nav>{{ resource.exhibition.title }}</template>
        <template #content>{{ resource.exhibition.content }}</template>

        <div v-masonry="masonry" item-selector="[data-masonry-tile]" transition-duration="0" class="mx-[-.5vw]">
            <div v-masonry-tile class="px-[.5vw] py-[1vw] md:w-1/3" v-for="cabinet in resource.exhibition.cabinets" :key="cabinet.id" data-masonry-tile>
                <a class="block" :href="route('cabinets.show', cabinet.id)">
                    <div class="bg-gray-500 mb-[.5vw]" v-if="cabinet.images.length" data-image-container>
                        <!-- <span v-html="cabinet.images[0].html"></span> -->
                        <img class="w-full" :src="cabinet.images[0].thumbnail">
                    </div>
                    <div class="font-bold uppercase text-[.75rem] md:text-base">{{ cabinet.title }}</div>
                </a>
            </div>
        </div>
    </frontend-layout>
</template>

<style>
[data-image-container] img {
    width: 100%;
}
</style>

<script>
import FrontendLayout from '@/Layouts/FrontendLayout.vue'

export default {
    components: { FrontendLayout },
    props: ['resource'],
    mounted() {
        localStorage.setItem('exhibition', this.resource.exhibition.id)
    }
}
</script>