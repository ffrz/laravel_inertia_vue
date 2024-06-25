import './bootstrap';
import '../css/app.css';
import { createApp, h } from 'vue'
import { Head, Link, createInertiaApp } from '@inertiajs/vue3'
import Layout from './Layouts/Layout.vue';

createInertiaApp({
    title: (title) => (title && title.length ? `My App ${title}` : 'My App'),
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el)
    },
    progress: {
        color: "red",
        includeCSS: true,
        showSpinner: true,
    }
})
