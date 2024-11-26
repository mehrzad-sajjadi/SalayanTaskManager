<template>
    <Head title="Room" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex w-[100%] flex-row justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    User
                </h2>
            </div>
        </template>

        <div class="w-5/6 mx-auto my-16 border border-gray-500 rounded-lg">
            <div
                class="flex flex-row justify-between items-center w-full min-h-min bg-[#21252908] border-b-2"
            >
                <p class="px-4 m-2 text-xl">لیست افراد شرکت</p>
                <div class="flex flex-row">
                    <!-- <Link
                        :href="route('task_create2')"
                        as="button"
                        type="button"
                        class="h-8 px-4 m-2 flex items-center text-sm transition-colors duration-150 rounded-lg focus:shadow-outline bg-white hover:bg-black text-black hover:text-white border border-black hover:border-transparent"
                        >افزودن تسک
                        <ClipboardDocumentListIcon
                            class="size-5"
                        ></ClipboardDocumentListIcon>
                    </Link> -->
                </div>
            </div>
            <ul>
                <li
                    v-for="(user, index) in users.data"
                    :key="index"
                    class="flex flex-row justify-between w-full min-h-min py-4 px-4 border-b-2 border-neutral-100 items-center hover:bg-[#21252908]"
                >
                    <div class="content">{{ user.name }}</div>
                    <div class="min-w-max px-5 flex flex-row justify-between">
                        <Link
                            :href="route('user_show', user.id)"
                            as="button"
                            type="button"
                            class="h-8 px-4 flex items-center m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-500 hover:bg-blue-600 rounded-lg focus:shadow-outline"
                        >
                            نمایش
                            <EyeIcon class="size-5"></EyeIcon>
                        </Link>

                        <!-- <Link
                            :href="route('task_create', user.id)"
                            as="button"
                            type="button"
                            class="h-8 px-4 m-2 flex items-center text-sm transition-colors duration-150 rounded-lg focus:shadow-outline bg-white hover:bg-black text-black hover:text-white border border-black hover:border-transparent"
                        >
                            افزودن تسک
                            <ClipboardDocumentListIcon
                                class="size-5"
                            ></ClipboardDocumentListIcon>
                        </Link> -->
                    </div>
                </li>
            </ul>
        </div>
        <pagination :links="users.links"></pagination>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link, router, usePage, Head, useForm } from "@inertiajs/vue3";
import Dashboard from "@/Pages/Dashboard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Pagination from "@/Components/Pagination.vue";

import {
    TrashIcon,
    EyeIcon,
    PencilSquareIcon,
    PlusCircleIcon,
    ClipboardDocumentListIcon,
} from "@heroicons/vue/24/solid";

const props = defineProps({
    users: Object,
});
</script>

<style></style>
