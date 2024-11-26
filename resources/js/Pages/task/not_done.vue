<template>
    <Head title="Room" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex w-[100%] flex-row justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Not Done Task
                </h2>
            </div>
        </template>

        <div class="w-5/6 mx-auto my-16 border border-gray-500 rounded-lg">
            <div
                class="flex flex-row justify-between items-center w-full min-h-min bg-[#21252908] border-b-2"
            >
                <p class="px-4 m-2 text-xl">تسک های انجام نشده</p>
                <div class="flex flex-row">
                    <Link
                        :href="route('task_create2')"
                        as="button"
                        type="button"
                        class="h-8 px-4 m-2 flex items-center text-sm transition-colors duration-150 rounded-lg focus:shadow-outline bg-white hover:bg-black text-black hover:text-white border border-black hover:border-transparent"
                    >
                        افزودن تسک
                        <ClipboardDocumentListIcon
                            class="size-5"
                        ></ClipboardDocumentListIcon>
                    </Link>

                    <Link
                        :href="route('task_index')"
                        as="button"
                        type="button"
                        class="h-8 px-4 m-2 flex items-center text-sm text-black duration-150 rounded-lg bg-[yellow] border-[yellow] border hover:border-black"
                        >تسک های در حال انجام

                        <ArrowPathRoundedSquareIcon
                            class="size-5"
                        ></ArrowPathRoundedSquareIcon>
                    </Link>
                    <Link
                        :href="route('task_done')"
                        as="button"
                        type="button"
                        class="h-8 px-4 flex items-center m-2 text-sm transition-colors duration-150 bg-[#6c757d] hover:bg-[#757b80] rounded-lg text-white border border-[#6c757d] hover:border-transparent"
                        >تسک های انجام شده

                        <CheckBadgeIcon class="size-5"></CheckBadgeIcon>
                    </Link>
                </div>
            </div>
            <ul>
                <li
                    v-for="(task, index) in tasks.data"
                    :key="index"
                    class="flex flex-row justify-between w-full min-h-min py-4 px-4 border-b-2 border-neutral-100 items-center hover:bg-[#21252908]"
                >
                    <div class="content flex flex-row w-[20%] justify-between">
                        {{ task.name }}
                    </div>
                    <div class="content flex flex-row w-[35%] justify-between">
                        <div>
                            مسئول :
                            {{ task.user_name }}
                        </div>
                    </div>
                    <div class="content flex flex-row w-[35%] justify-between">
                        <div>
                            مهلت :
                            {{ task.shamsi_deadline }}
                        </div>
                    </div>

                    <div class="min-w-max px-5 flex flex-row justify-between">
                        <button
                            @click="remove(task.id)"
                            class="h-8 px-4 m-2 flex items-center text-sm text-white duration-150 rounded-lg bg-red-600 border-red-600 border hover:border-black"
                            as="button"
                            type="button"
                        >
                            حذف
                            <TrashIcon class="size-5"></TrashIcon>
                        </button>
                        <Link
                            :href="route('task_edit', task.id)"
                            as="button"
                            type="button"
                            class="h-8 px-4 m-2 flex items-center text-sm transition-colors duration-150 rounded-lg focus:shadow-outline bg-white hover:bg-black text-black hover:text-white border border-black hover:border-transparent"
                        >
                            ویرایش
                            <PencilSquareIcon class="size-5"></PencilSquareIcon>
                        </Link>
                    </div>
                </li>
            </ul>
        </div>

        <pagination :links="tasks.links"></pagination>
    </AuthenticatedLayout>
</template>

<script setup>
import { Link, router, usePage, Head, useForm } from "@inertiajs/vue3";
import Dashboard from "@/Pages/Dashboard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Pagination from "@/Components/Pagination.vue";

import {
    ArrowPathRoundedSquareIcon,
    TrashIcon,
    EyeIcon,
    PencilSquareIcon,
    PlusCircleIcon,
    ClipboardDocumentListIcon,
    CheckBadgeIcon,
} from "@heroicons/vue/24/solid";

const props = defineProps({
    tasks: Object,
});
</script>

<style></style>
