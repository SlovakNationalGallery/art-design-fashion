require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { VueMasonryPlugin } from 'vue-masonry/src/masonry-vue3.plugin'
import mitt from 'mitt'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        const instance = createApp({ render: () => h(app, props) })
        instance.config.globalProperties.emitter = mitt()

        instance.use(plugin)
            .use(VueMasonryPlugin)
            .mixin({ methods: { route } })
            .mount(el);

        return instance
    },
});


InertiaProgress.init({ color: '#4B5563' });
