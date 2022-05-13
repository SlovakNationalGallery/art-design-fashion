<template>
    <div class="shadow-sm">
        <QuillEditor
            v-bind="$attrs"
            contentType="html"
            theme="snow"
            :toolbar="['bold', 'italic', 'underline', 'clean']"
            :content="modelValue"
            @update:content="$emit('update:modelValue', $event)"
        />
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'

export default defineComponent({
    components: {
        QuillEditor
    },
    props: ['modelValue'],

    emits: ['update:modelValue'],
})
</script>
