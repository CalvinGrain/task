<script setup>
import dayjs from "dayjs"
import {Link} from "@inertiajs/vue3";

defineProps({
    type: String,
    posts: Object,
});
</script>

<template>
    <section>
        <div class="grid grid-cols-1 md:grid-cols-3 justify-center gap-y-8 lg:gap-y-4 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-5">
            <article v-for="post in posts" class="border border-gray-300 rounded-2xl">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1726266852936-bb4cfcdffaf0?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="blogs tailwind section" class="rounded-t-2xl w-full object-cover">
                </div>
                <div class="p-4 lg:p-6 transition-all duration-300 rounded-b-2xl group-hover:bg-gray-50">
                    <span class="text-indigo-600 font-medium mb-3 block">
                        <time :datetime="post.created_at" class="text-gray-500">{{ dayjs(post.created_at).format('YYYY-MM-DD HH:mm') }}</time>
                        by {{ post.author.name }}
                    </span>
                    <h4 class="text-xl text-gray-900 font-medium leading-8 mb-5">
                        {{ post.title }}
                    </h4>
                    <p class="text-gray-500 leading-6 mb-10">
                        {{ post.description }}..
                    </p>
                    <Link :href="route(type + '.single', {'id':post.id})" class="cursor-pointer text-lg text-indigo-600 font-semibold">Read more..</Link>
                </div>
            </article>
        </div>
    </section>
</template>
