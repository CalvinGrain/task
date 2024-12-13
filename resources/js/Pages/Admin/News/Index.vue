<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PostList from "@/Components/PostList.vue";

defineProps({
    posts: Object,
});

function confirm(){
    return window.confirm("Are you sure?");
}
</script>

<template>
    <AppLayout title="News">
        <div class="max-w-7xl mx-auto py-20 sm:px-6 lg:px-8">
            <h2 class="py-5 font-semibold text-xl text-gray-800 leading-tight">
                News
            </h2>

            <PostList :posts="posts" type="news" />

        </div>
    </AppLayout>
</template>
