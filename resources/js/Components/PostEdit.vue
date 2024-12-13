<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from "@/Components/TextArea.vue";
import FormSectionFull from "@/Components/FormSectionFull.vue";

const props = defineProps({
    post: Object,
    type: String,
});

const form = useForm({
    title: props.post?.title,
    description: props.post?.description,
    text: props.post?.text,
});

const savePost = () => {
    if(props.post?.id) {
        form.put(route(props.type+'.update', props.post.id), {
            errorBag: 'savePost',
            preserveScroll: true,
        });
    } else {
        form.post(route(props.type+'.store'), {
            errorBag: 'savePost',
            preserveScroll: true,
        });
    }
};
</script>

<template>
    <h1 class="capitalize text-2xl py-5">{{ props.type }}</h1>
    <FormSectionFull @submitted="savePost">
        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.title" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="description" value="Description" />
                <TextArea
                    id="description"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="text" value="Text" />
                <TextArea
                    id="text"
                    v-model="form.text"
                    type="password"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.text" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSectionFull>
</template>
