<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import FormSectionFull from "@/Components/FormSectionFull.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Checkbox from "@/Components/Checkbox.vue";

const props = defineProps({
    user: Object,
    roles: Object,
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    roles: props.user.roles.map(role => role.id),
});

const saveUser = () => {
    form.put(route('users.update', props.user.id), {
        errorBag: 'saveUser',
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout title="Edit user">
        <template #header>
            <h2 class="mt-20 font-semibold text-xl text-gray-800 leading-tight">
                Edit user
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-20 sm:px-6 lg:px-8">
                <h1 class="capitalize text-2xl py-5">User</h1>
                <FormSectionFull @submitted="saveUser">
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
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                v-model="form.email"
                                type="text"
                                class="mt-1 block w-full"
                            />
                            <InputError :message="form.errors.email" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="roles" value="Roles" />
                            <span v-for="role in roles" class="pr-3">
                                <Checkbox :key="role.id" :label="role.name" :value="role.id" v-model="form.roles" :checked="form.roles" />
                                {{ role.name }}
                            </span>
                            <InputError :message="form.errors.roles" class="mt-2" />
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
