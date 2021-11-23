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
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
import JetTextarea from '@/Jetstream/Textarea.vue'

export default {
    components: {
        JetButton,
        JetInput,
        JetLabel,
        JetTextarea,
    },
    props: ['form'],
    emits: ['submit'],
}
</script>
