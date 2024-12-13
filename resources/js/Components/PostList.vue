<script setup>
import {Link} from '@inertiajs/vue3';
import dayjs from "dayjs";
import AdminEditButton from "@/Components/AdminEditButton.vue";
import AdminDeleteButton from "@/Components/AdminDeleteButton.vue";

const props = defineProps({
    posts: Object,
    type: String,
});
</script>

<template>

    <Link v-can="'create '+type" :href="route(type+'.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</Link>

    <table class="mt-5 w-full divide-y divide-gray-200">
        <thead class="bg-gray-100 whitespace-nowrap">
        <tr>
            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                Title
            </th>
            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                Author
            </th>
            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                Created At
            </th>
            <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="post in posts">
            <td class="px-6 py-3 text-nowrap truncate">{{ post.title }}</td>
            <td class="px-6 py-3">{{ post.author.name }}</td>
            <td class="px-6 py-4  text-xs text-gray-800">{{ dayjs(post.created_at).format('YYYY-MM-DD HH:mm:ss') }}</td>
            <td class="px-4 py-4 text-sm text-gray-800">
                <AdminEditButton v-can="'update '+type" :href="route(type+'.show', post.id)"/>
                <AdminDeleteButton v-can="'delete '+type" :href="route(type+'.destroy', post.id)"/>
            </td>
        </tr>
        </tbody>
    </table>
</template>
