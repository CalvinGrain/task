<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PostEdit from "@/Components/PostEdit.vue";

defineProps({
    post: Object
});
</script>

<template>
    <AppLayout title="Edit news">
        <template #header>
            <h2 class="mt-20 font-semibold text-xl text-gray-800 leading-tight">
                Edit news
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-20 sm:px-6 lg:px-8">
                <PostEdit :post="post" type="news"/>
            </div>
        </div>
    </AppLayout>
</template>
