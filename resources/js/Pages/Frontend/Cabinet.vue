<template>
    <frontend-layout>
        <template #nav>{{ cabinet.title }}</template>
        <template #back>&larr; Zpět</template>
        <template #content>
            <div v-html="cabinet.content" class="font-normal" />
        </template>

        <div v-masonry="masonry" item-selector="[data-masonry-tile]" transition-duration="0" class="mx-[-.5vw]">
            <div v-masonry-tile class="px-[.5vw] py-[1vw] md:w-1/3" v-for="item in items" :key="`item_${item.id}`" data-masonry-tile>
                <a class="block" :href="route('items.show', item.document.id)">
                    <div class="bg-gray-500 mb-[.5vw] relative" :style="style(item)">
                        <img class="h-full w-full" :src="item.model.image_url" alt="">
                    </div>
                    <div class="uppercase text-[1rem] md:text-base">{{ item.document.content.title }}</div>
                </a>
            </div>
        </div>
        <div ref="last"></div>
    </frontend-layout>
</template>

<script>
import FrontendLayout from '@/Layouts/FrontendLayout.vue'

export default {
    components: { FrontendLayout },
    props: ['cabinet', 'apiUrl'],
    data() {
        return {
            items: [],
            page: 1,
            observer: new IntersectionObserver(this.observerCallback),
        }
    },
    methods: {
        style(item) {
            const ratio = item.document.content.image_ratio
            return {
                // paddingBottom: ratio ? `${1 / ratio * 100}%` : '114.4%'
            }
        },
        loadItems() {
            axios.get(`${this.apiUrl}/items`, {
                params: {
                    'filter[location]': this.cabinet.location,
                    size: 12,
                    page: this.page,
                }
            }).then(({ data }) => {
                if (data.data.length) {
                    if (this.page === 1 && data.data.length === 1) {
                        window.location.replace(`/items/${data.data[0].document.id}`)
                        return
                    }

                    this.page += 1
                    this.items.push(...data.data)

                    this.$nextTick(() => {
                        this.observer.observe(this.$refs.last)
                    })
                }
            })
        },
        observerCallback(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.observer.unobserve(entry.target)
                    this.loadItems()
                }
            })
        },
    },
    mounted() {
        this.loadItems()
    }
}
</script>