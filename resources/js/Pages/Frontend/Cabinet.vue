<template>
    <frontend-layout>
        <a class="block" :href="route('item', item.document.id)" v-for="item in items" :key="`item_${item.id}`">{{ item.document.content.title }}</a>
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
        const API_URL = 'http://localhost:8002/items'
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