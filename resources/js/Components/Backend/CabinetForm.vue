<template>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">

                <form @submit.prevent="$emit('submit')">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <jet-label for="title" value="Title" class="font-bold text-xl" required />
                                    <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" />
                                </div>

                                <div class="col-span-6">
                                    <jet-label for="content" value="Content" class="font-bold text-xl" />
                                    <jet-textarea id="content" type="textarea" class="mt-1 block w-full" v-model="form.content" rows="10" />
                                </div>

                                <div class="col-span-6">
                                    <jet-label for="location" value="Location" class="font-bold text-xl" />
                                    <jet-input id="location" type="text" class="mt-1 block w-full" v-model="form.location" required />
                                </div>

                                <div class="col-span-6">
                                    <jet-label for="exhibition_id" value="Exhibition" class="font-bold text-xl" />
                                    <jet-select id="exhibition_id" :options="exhibitions" class="mt-1 block w-full" v-model="form.exhibition_id" required />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <jet-label for="images" value="Image" class="font-bold text-xl" />
                                    <div class="mt-1">
                                        <media-library-attachment
                                            id="images"
                                            name="images"
                                            route-prefix="admin/media-library-pro"
                                            :initial-value="form.images"
                                            rules="mimes:jpeg,png"
                                            @is-ready-to-submit-change="isReadyToSubmit = $event"
                                            @change="onImagesChange" />
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing || !isReadyToSubmit">
                                    Save
                                </jet-button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


</template>

<script>
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetSelect from '@/Jetstream/Select.vue'
import JetTextarea from '@/Jetstream/Textarea.vue'
import { MediaLibraryAttachment } from "media-library-pro-vue3-attachment";

export default {
    components: {
        JetButton,
        JetInput,
        JetLabel,
        JetSelect,
        JetTextarea,
        MediaLibraryAttachment
    },
    props: ['form'],
    emits: ['submit'],
    data() {
        return {
            exhibitions: [],
            isReadyToSubmit: true,
        }
    },
    mounted() {
        axios.get(this.route('admin.exhibitions.index')).then(({ data }) => {
            this.exhibitions = Object.fromEntries(
                data.map(exhibition => [exhibition.id, exhibition.title])
            )
        })
    },
    methods: {
        onImagesChange(images) {
            this.form.images = images
        }
    }
}
</script>
