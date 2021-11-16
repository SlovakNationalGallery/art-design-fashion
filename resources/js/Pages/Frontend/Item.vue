<template>
    <frontend-layout>
        <div v-if="item">
            {{ item.document.content.title }}
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
    }
}
</script>