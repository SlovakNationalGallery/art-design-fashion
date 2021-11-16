<template>
    <frontend-layout>
        <template #nav>{{ cabinet.title }}</template>
        <template #back>&larr; Zpět</template>

        <div v-masonry="masonry" item-selector="[data-masonry-tile]" transition-duration="0" class="mx-[-.5vw]">
            <div v-masonry-tile class="px-[.5vw] py-[1vw] w-1/4" v-for="item in items" :key="`item_${item.id}`" data-masonry-tile>
                <a class="block" :href="route('item', item.document.id)">
                    <div class="bg-gray-500">
                        <img :src="item.model.image_url" alt="">
                    </div>
                    <div class="font-bold mt-[.5vw] uppercase">{{ item.document.content.title }}</div>
                </a>
            </div>
        </div>
    </frontend-layout>
</template>

<script>
import FrontendLayout from '@/Layouts/FrontendLayout.vue'

export default {
    components: { FrontendLayout },
    props: ['cabinet'],
    data() {
        return {
            items: [],
        }
    },
    created() {
        const API_URL = 'http://localhost:8001/api/items'
        axios.get(API_URL, {
            params: {
                'filter[additionals.location.keyword]': this.cabinet.location,
                size: 10000,
            }
        }).then(({ data }) => {
            this.items = data.data
        })
    }
}
</script>