<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import dayjs from "dayjs";
import AdminEditButton from "@/Components/AdminEditButton.vue";
import AdminDeleteButton from "@/Components/AdminDeleteButton.vue";

const props = defineProps({
    users: Object
});
</script>

<template>
    <AppLayout title="Users">
        <div class="max-w-7xl mx-auto py-20 sm:px-6 lg:px-8">
            <h2 class="py-5 font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>

            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 whitespace-nowrap">
                <tr>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Roles
                    </th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Created At
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="user in users">
                    <td class="px-6 py-3">{{ user.name }}</td>
                    <td class="px-6 py-3">{{ user.email }}</td>
                    <td class="px-6 py-3">
                        <span v-for="role in user.roles"
                              class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 mr-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                            {{ role.name }}
                        </span>
                    </td>
                    <td class="px-6 py-4  text-xs text-gray-800">{{
                            dayjs(user.created_at).format('YYYY-MM-DD HH:mm:ss')
                        }}
                    </td>
                    <td class="text-right">
                        <div class="inline-flex items-center rounded-md shadow-sm">
                            <AdminEditButton v-can="'update users'" :href="route('users.show', user.id)"/>
                            <AdminDeleteButton v-can="'delete users'" :disabled="user.id===1" :href="route('users.destroy', user.id)"/>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
