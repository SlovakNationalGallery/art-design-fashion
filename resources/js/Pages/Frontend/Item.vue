<template>
    <frontend-layout>
        <template #nav>
            {{ item.document.content.additionals.location[1] }}
        </template>
        <template #back>&larr; Zpět</template>

        <div class="flex" v-if="item">
            <div class="w-1/2">
                <div class="bg-gray-100" style="aspect-ratio: 9/16"></div>
            </div>
            <div class=" text-2xl w-1/2">
                <h1>{{ title }}</h1>
                <div>{{ author }}</div>
                <div>{{ item.document.content.dating }}</div>
            </div>
        </div>
    </frontend-layout>
</template>

<script>
import FrontendLayout from '@/Layouts/FrontendLayout.vue'

export default {
    components: { FrontendLayout },
    props: ['id'],
    data() {
        return {
            item: null
        }
    },
    created() {
        const API_URL = `http://localhost:8002/items/${this.id}`
        axios.get(API_URL).then(({ data }) => {
            this.item = data
        }).catch(() => {
            // error
        })
    },
    computed: {
        title() {
            if (this.item.document.content.title === 'bez názvu') {
                return this.item.document.content.medium // todo object
            }

            return this.item.document.content.title
        },
        author() {
            return this.item.document.content.author[0] // todo comma split
        }
    }
}
</script>