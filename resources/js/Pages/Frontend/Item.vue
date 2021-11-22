<template>
    <frontend-layout>
        <template #nav v-if="item">
            {{ item.document.content.location[1] }}
        </template>
        <template #back>&larr; Zpět</template>

        <div class="flex mx-[-1.5vw]" v-if="item">
            <div class="w-1/2 px-[1.5vw] py-[.5vw]">
                <img class="mx-auto" :src="item.model.image_url" alt="">
            </div>
            <div class="w-1/2 px-[1.5vw] py-[.5vw]">
                <div class="mb-[2vw] text-2xl">
                    <p>{{ item.document.content.title }}</p>
                    <p>{{ item.document.content.dating }}</p>
                    <p>{{ item.document.content.author.join(', ') }}</p>
                </div>
                <div class="my-[2vw] text-lg">
                    <p v-for="(label, attr) in attrs" :key="attr">
                        <template v-if="formatAttr(item.document.content[attr])">
                            {{ label }} &ndash; {{ formatAttr(item.document.content[attr]) }}
                        </template>
                    </p>
                </div>
                <p class="my-[2vw] max-w-[40vw] text-lg">
                    {{ item.document.content.description }}
                </p>
            </div>
        </div>
    </frontend-layout>
</template>

<script>
import FrontendLayout from '@/Layouts/FrontendLayout.vue'

export default {
    components: { FrontendLayout },
    props: ['id', 'apiUrl'],
    data() {
        return {
            item: null,
            attrs: {
                'dating': 'Datace',
                'measurement': 'Rozměry',
                'work_type': 'Výtvarný druh',
                'topic': 'Námět',
                'medium': 'Materiál',
                'technique': 'Technika',
                'state_edition': 'Původnost',
                'integrity': 'Stupeň integrity',
                'integrity_work': 'Integrita s díly',
                'inscription': 'Značení',
                'gallery': 'Galerie',
                'identifier': 'Inventární číslo',
                'aquisition_date': 'Datum akvizice',
                'place': 'Místo vzniku',
                'location': 'Lokace',
            },
        }
    },
    created() {
        axios.get(`${this.apiUrl}/items/${this.id}`).then(({ data }) => {
            this.item = data
        }).catch(() => {
            // error
        })
    },
    methods: {
        formatAttr(attr) {
            if (Array.isArray(attr)) {
                return attr.join(', ')
            }

            return attr
        }
    }
}
</script>