import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.js";

import "../../public/css/tabler.css";
import "../../public/css/demo.css";
import "../../public/css/reset.css"
import "../../public/css/flags.css"
import "../../public/css/vendor.css";

import FlagIcon from 'vue-flag-icon'
import VueTablerIcons from "vue-tabler-icons";
import VueEasyLightbox from 'vue-easy-lightbox'



const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(FlagIcon)
            .use(VueTablerIcons)
            .use(VueEasyLightbox)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

