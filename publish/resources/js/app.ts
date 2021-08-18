import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import DefaultLayout from './Layouts/Default.vue';
import Components from './components'
import LitBlock from '@aw-studio/vue-lit-block'

createInertiaApp({
    resolve: name => {
        const page = require(`./Pages/${name}`).default
        page.layout = page.layout || DefaultLayout
        return page
    },
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(Components)
            .use(LitBlock)
            .mount(el)
    },
})