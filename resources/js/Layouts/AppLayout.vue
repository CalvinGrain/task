<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import Toast from "@/Components/Toast.vue";

defineProps({
    title: String,
});

</script>

<template>
    <div class="relative w-full min-h-screen">
        <Head :title="title" />

        <nav class="w-full bg-gray-800 fixed top-0 z-10">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="flex flex-1 sm:items-stretch justify-start">
                        <Link :href="route('landing')" class="flex shrink-0 items-center">
                            <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                        </Link>
                        <div class="sm:ml-6">
                            <div class="flex space-x-4">
                                <NavLink :href="route('news')" :active="route().current('news*')">News</NavLink>
                                <NavLink :href="route('blogs')" :active="route().current('blogs*')">Blog</NavLink>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <!-- Profile dropdown -->
                        <Dropdown v-if="$page.props.auth.user" align="right" width="48">
                            <template #trigger>
                                 <span  class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">

                                        <img v-if="$page.props.jetstream.managesProfilePhotos" class="h-8 w-8 mr-2 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                                        <img v-else class="h-8 w-8 mr-2 rounded-full object-cover"
                                         :src="'https://api.dicebear.com/9.x/initials/svg?seed='+$page.props.auth.user.name+'&radius=50&backgroundType=solid,gradientLinear&fontSize=51&fontWeight=900'"
                                         alt="avatar" />

                                        {{ $page.props.auth.user.name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Account
                                </div>

                                <DropdownLink :href="route('profile.show')">
                                    Profile
                                </DropdownLink>

                                <!-- Administration -->
                                <div v-can="['news', 'blogs', 'users', 'permissions']">
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Administration
                                    </div>

                                    <DropdownLink v-can="'news'" :href="route('news.index')">
                                        News
                                    </DropdownLink>

                                    <DropdownLink v-can="'blogs'" :href="route('blogs.index')">
                                        Blogs
                                    </DropdownLink>

                                    <DropdownLink v-can="'users'" :href="route('users.index')">
                                        Users
                                    </DropdownLink>

                                    <DropdownLink v-can="'roles'" :href="route('roles.index')">
                                        Roles
                                    </DropdownLink>
                                </div>


                                <div class="border-t border-gray-200" />

                                <!-- Authentication -->

                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>

                        <template v-else>
                            <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>

                            <Link :href="route('register')" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
                        </template>

                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <transition name="fade" mode="out-in" appear>
                <slot />
            </transition>

            <Toast/>
        </main>

    </div>
</template>
