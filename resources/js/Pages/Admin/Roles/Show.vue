<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import FormSectionFull from "@/Components/FormSectionFull.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Checkbox from "@/Components/Checkbox.vue";
import {computed} from "vue";

const props = defineProps({
    role: Object,
    permissions: Object,
});

const form = useForm({
    name: props.role.name,
    permissions: props.role.permissions.map(role => role.id),
});

const saveRole = () => {
    form.put(route('roles.update', props.role.id), {
        errorBag: 'saveRole',
        preserveScroll: true,
    });
};

const groupedPermissions = computed(() => {
    return props.permissions.reduce((groups, permission) => {
        const [,groupName] = permission.name.split(' ');
        if (!groups[groupName]) {
            groups[groupName] = [];
        }
        groups[groupName].push(permission);
        return groups;
    }, {});
});
</script>

<template>
    <AppLayout title="Edit role">
        <template #header>
            <h2 class="mt-20 font-semibold text-xl text-gray-800 leading-tight">
                Edit role
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-20 sm:px-6 lg:px-8">
                <h1 class="capitalize text-2xl py-5">Role</h1>
                <FormSectionFull @submitted="saveRole">
                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="name" value="Name" />
                            <TextInput
                                id="name"
                                v-model="form.name"
                                type="text"
                                class="mt-1 block w-full"
                            />
                            <InputError :message="form.errors.name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="permissions" value="Permissions" />
                            <div v-for="(group, groupName) in groupedPermissions" :key="groupName" class="mb-4">
                                <h3 class="font-semibold capitalize">{{ groupName }}</h3>
                                <span v-for="permission in group" :key="permission.id" class="text-nowrap pr-3">
                                    <Checkbox :key="permission.id" :label="permission.name" :value="permission.id" v-model="form.permissions" :checked="form.permissions"/>
                                    {{ permission.name.split(' ')[0] }}
                                </span>
                            </div>
                            <InputError :message="form.errors.permissions" class="mt-2" />
                        </div>
                    </template>

                    <template #actions>
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </template>
                </FormSectionFull>
            </div>
        </div>
    </AppLayout>
</template>
