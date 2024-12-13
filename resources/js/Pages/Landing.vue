<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <AppLayout title="Test">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="text-center py-20">
                <h1 class="text-5xl font-bold text-white mb-4">Welcome to Our Website</h1>
                <p class="text-lg text-gray-400 mb-8">Discover amazing content and stay updated with the latest news and
                    blogs.</p>
                <div class="flex justify-center space-x-4">
                    <Link :href="route('news')" class="px-4 py-2 bg-blue-500 text-white rounded">Read News</Link>
                    <Link :href="route('blogs')" class="px-4 py-2 bg-green-500 text-white rounded">Visit Blog</Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
