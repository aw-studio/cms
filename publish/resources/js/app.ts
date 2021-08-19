import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import DefaultLayout from './Layouts/Default.vue';
import Components from './components'
import LitBlock from '@aw-studio/vue-lit-block'
import LitImage from '@aw-studio/vue-lit-image-next'

import '@aw-studio/vue-lit-image-next/dist/dist/index.css'

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
            .use(LitImage, {
                conversions: {
                    thumb: 10,
                    sm: 300,
                    md: 500,
                    lg: 900,
                    xl: 1400,
                },
            })
            .mount(el)
    },
})