<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form @submit.prevent="$emit('submit')">
                    <div>
                        <jet-label for="title" value="Title" />
                        <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" required />
                    </div>

                    <div class="mt-4">
                        <jet-label for="content" value="Content" />
                        <jet-textarea id="content" type="textarea" class="mt-1 block w-full" v-model="form.content" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </jet-button>
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
