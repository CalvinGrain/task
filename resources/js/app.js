import './bootstrap';
import '../css/app.css';

import {createApp, h} from 'vue';
import {createInertiaApp, usePage} from '@inertiajs/vue3';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const shared = usePage()

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
            .directive('hasRoles', (el, binding) => {
                if (!shared.props.user.roles.includes(binding.value)) {
                    el.style.display = 'none';
                }
            })
            .directive('can', (el, binding) => {
                const permissions = Array.isArray(binding.value) ? binding.value : [binding.value];
                if (!permissions.some(permission => shared.props.user_permissions.some(userPermission => userPermission.includes(permission)))) {
                    el.style.display = 'none';
                }
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
