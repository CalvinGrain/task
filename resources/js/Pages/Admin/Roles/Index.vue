<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import dayjs from "dayjs";
import AdminEditButton from "@/Components/AdminEditButton.vue";

const props = defineProps({
    roles: Object
});
</script>

<template>
    <AppLayout title="Roles">
        <div class="max-w-7xl mx-auto py-20 sm:px-6 lg:px-8">
            <h2 class="py-5 font-semibold text-xl text-gray-800 leading-tight">
                Roles
            </h2>

            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 whitespace-nowrap">
                <tr>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Created At
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="role in roles">
                    <td class="px-6 py-3">{{ role.name }}</td>
                    <td class="px-6 py-4  text-xs text-gray-800">{{
                            dayjs(role.created_at).format('YYYY-MM-DD HH:mm:ss')
                        }}
                    </td>
                    <td class="text-right">
                        <div class="inline-flex items-center rounded-md shadow-sm">
                            <AdminEditButton v-can="'update roles'" :href="route('roles.show', role.id)"/>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
