<template>
    <div class="pb-[4vw] px-4 md:px-[2vw]">
        <div class="md:flex font-display mx-[-.5vw] my-[.5vw] text-[3rem] md:text-[3vw] uppercase">
            <div class="px-[.5vw] md:w-1/4 space-x-4 md:space-x-[1vw]">
                <span>Art</span>
                <span>Design</span>
                <span>Fashion</span>
            </div>
            <div class="flex flex-wrap justify-end px-[.5vw] md:ml-20 flex-grow">
                <span class="flex-grow"><slot name="nav"></slot></span>
                <span class="cursor-pointer ml-5" @click.once="back"><slot name="back"></slot></span>
            </div>
        </div>

        <div class="flex flex-wrap mx-[-.5vw]">
            <div class="md:ml-[25%] pb-[1vw] px-[.5vw] text-[1rem] md:text-lg md:w-1/2" data-content><slot name="content"></slot></div>
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
    data() {
        return {
            idleTimeout: null,
        }
    },
    methods: {
        back() {
            window.history.back()
        },
        initIdleTimer() {
            // Reset the idle timeout on any of the events listed below
            for (const event of ['click', 'touchstart', 'mousemove']) {
                document.addEventListener(event, this.resetIdleTimer, false)
            }

            // Start the timer
            this.resetIdleTimer()
        },
        resetIdleTimer() {
            if (this.idleTimeout) clearTimeout(this.idleTimeout)

            const id = localStorage.getItem('exhibition')

            if (id) {
                const fiveMinutes = 1000 * 60 * 5
                const redirectUrl = this.route('exhibitions.show', id)
                this.idleTimeout = setTimeout(() => location.href = redirectUrl, fiveMinutes)
            }
        }
    },
    mounted() {
        this.initIdleTimer()
    }
}
</script>