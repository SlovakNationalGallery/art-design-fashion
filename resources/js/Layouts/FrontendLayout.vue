<template>
    <div class="pb-[4vw] px-[2vw]">
        <div class="flex font-display mx-[-.5vw] my-[.5vw] text-[3vw] uppercase">
            <div class="px-[.5vw] w-1/4">
                <span class="pr-[1vw]">Art</span>
                <span class="pr-[1vw]">Design</span>
                <span>Fashion</span>
            </div>
            <div class="flex justify-between px-[.5vw] w-3/4">
                <span><slot name="nav"></slot></span>
                <span class="cursor-pointer" @click.once="back"><slot name="back"></slot></span>
            </div>
        </div>

        <div class="flex flex-wrap mx-[-.5vw]">
            <div class="ml-[25%] pb-[1vw] px-[.5vw] text-lg w-1/2" data-content><slot name="content"></slot></div>
        </div>

        <slot></slot>
    </div>
</template>

<style scoped>
[data-content]:empty {
    display: none;
}
</style>

<script>
export default {
    methods: {
        back() {
            window.history.back()
        }
    }
}
</script>