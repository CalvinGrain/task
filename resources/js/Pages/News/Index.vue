<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Posts from "@/Components/Posts.vue";

defineProps({ posts: Object })
</script>

<template>
    <AppLayout title="News">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                News
            </h2>
        </template>

        <div class="py-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Posts :posts="posts" type="news"/>
            </div>
        </div>
    </AppLayout>
</template>
