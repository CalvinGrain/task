<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    as: String,
    method: {
        type: String,
        default: 'get',
    },
});
</script>

<template>
    <Link :as="as" :method="method" :href="href" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
        <slot />
    </Link>
</template>
