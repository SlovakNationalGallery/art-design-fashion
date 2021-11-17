<template>
    <div class="px-[2vw]">
        <div class="flex font-display mx-[-.5vw] my-[.5vw] text-[3vw] uppercase">
            <div class="px-[.5vw] w-1/4">
                <span class="pr-[1vw]">Art</span>
                <span class="pr-[1vw]">Design</span>
                <span>Fashion</span>
            </div>
            <div class="flex justify-between px-[.5vw] w-3/4">
                <span><slot name="nav"></slot></span>
                <span class="cursor-pointer" @click="back"><slot name="back"></slot></span>
            </div>
        </div>
        <slot></slot>
    </div>
</template>

<script>
export default {
    created() {
        window.axios.defaults.params = {}
        window.axios.defaults.params['locale'] = 'cs'
    },
    methods: {
        back() {
            window.history.back()
        }
    }
}
</script>