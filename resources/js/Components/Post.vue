<script setup>
import dayjs from "dayjs"

defineProps({
    type: String,
    post: Object,
});
</script>

<template>
    <section>
        <article>
            <img src="https://images.unsplash.com/photo-1726266852936-bb4cfcdffaf0?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="blogs tailwind section" class="w-full lg:w-2/3 object-cover">
            <div class="mt-5 transition-all duration-300 rounded-b-2xl group-hover:bg-gray-50">
                <span class="text-indigo-600 font-medium mb-3 block">
                    <time :datetime="post.created_at" class="text-gray-500">{{ dayjs(post.created_at).format('YYYY-MM-DD HH:mm') }}</time>
                    by {{ post.author.name }}
                </span>
                <h4 class="text-xl text-gray-900 font-medium leading-8 mb-5">
                    {{ post.title }}
                </h4>
                <p class="text-gray-500 leading-6 mb-10">
                    {{ post.text }}
                </p>
            </div>
        </article>
    </section>
</template>
