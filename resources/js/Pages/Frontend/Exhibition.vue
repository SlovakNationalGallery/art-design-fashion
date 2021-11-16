<template>
    <frontend-layout>
        <a :href="route('cabinet', cabinet.id)" v-for="cabinet in exhibition.cabinets" :key="`cabinet_${cabinet.id}`">
            {{ cabinet.title }}
        </a>
    </frontend-layout>
</template>

<script>
import FrontendLayout from '@/Layouts/FrontendLayout.vue'

export default {
    components: { FrontendLayout },
    props: ['exhibition'],
}
</script>