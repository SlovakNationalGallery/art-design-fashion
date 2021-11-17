<template>
    <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" v-model="modelValue" @change="$emit('update:modelValue', $event.target.value)">
        <option></option>
        <option v-for="(label, value) in options" :value="value" :key="value" :checked="value == modelValue">{{ label }}</option>
    </select>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: ['modelValue', 'options'],
        emits: ['update:modelValue'],
    })
</script>
