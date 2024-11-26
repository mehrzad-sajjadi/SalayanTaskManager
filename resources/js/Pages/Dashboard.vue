<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Your Tasks
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ul>
                            <li
                                v-for="(task, index) in tasks.data"
                                :key="index"
                                class="flex flex-row justify-between w-full min-h-min py-4 px-4 border-b-2 border-neutral-100 items-center hover:bg-[#21252908]"
                            >
                                <div
                                    class="content flex flex-row w-[20%] justify-between"
                                >
                                    {{ task.name }}
                                </div>
                                <div
                                    class="content flex flex-row w-[35%] justify-between"
                                >
                                    <div>
                                        مهلت :
                                        {{ task.shamsi_deadline }}
                                    </div>
                                </div>

                                <div
                                    class="min-w-max px-5 flex flex-row justify-between"
                                >
                                    <Link
                                        v-if="
                                            task.is_done == 0 &&
                                            task.deadline >= now
                                        "
                                        :href="
                                            route('response_create', task.id)
                                        "
                                        as="button"
                                        type="button"
                                        class="h-8 px-4 flex items-center m-2 text-sm transition-colors duration-150 bg-[#6c757d] hover:bg-[#757b80] rounded-lg text-white border border-[#6c757d] hover:border-transparent"
                                    >
                                        ثبت گزارش
                                        <DocumentArrowDownIcon
                                            class="size-5"
                                        ></DocumentArrowDownIcon>
                                    </Link>
                                    <Link
                                        v-if="task.is_done == 1"
                                        :href="route('response_show', task.id)"
                                        as="button"
                                        type="button"
                                        class="h-8 px-4 flex items-center m-2 text-sm transition-colors duration-150 bg-[#9dff00] hover:bg-[#11ff00] rounded-lg focus:shadow-outline"
                                    >
                                        ثبت شد
                                        <CheckBadgeIcon
                                            class="size-5"
                                        ></CheckBadgeIcon>
                                    </Link>

                                    <span
                                        v-if="
                                            task.is_done == 0 &&
                                            task.deadline < now
                                        "
                                        as="button"
                                        type="button"
                                        class="h-8 px-4 m-2 flex items-center text-sm text-white duration-150 rounded-lg bg-red-600 border-red-600 border hover:border-black"
                                    >
                                        اتمام مهلت
                                        <NoSymbolIcon
                                            class="size-5"
                                        ></NoSymbolIcon>
                                    </span>
                                </div>
                            </li>
                        </ul>
                        <p
                            class="flex flex-row justify-center text-xl text-center"
                            v-if="$page.props.crud.success"
                        >
                            {{ $page.props.crud.success }}
                        </p>
                        <p
                            class="flex flex-row justify-center text-xl text-center pt-5 text-red-600"
                            v-if="$page.props.errors"
                        >
                            <span
                                v-for="(error, index) in errors"
                                :key="index"
                                >{{ error }}</span
                            >
                        </p>

                        <pagination :links="tasks.links"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import { Link, router, usePage, Head, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import "../../css/font.css";
import Pagination from "@/Components/Pagination.vue";

import {
    TrashIcon,
    EyeIcon,
    PencilSquareIcon,
    PlusCircleIcon,
    ClipboardDocumentCheckIcon,
    DocumentArrowDownIcon,
    CheckBadgeIcon,
    NoSymbolIcon,
} from "@heroicons/vue/24/solid";
export default {
    components: {
        Pagination,
        ClipboardDocumentCheckIcon,
        CheckBadgeIcon,
        Link,
        usePage,
        router,
        useForm,
        AuthenticatedLayout,
        Head,
        TrashIcon,
        EyeIcon,
        PlusCircleIcon,
        PencilSquareIcon,
        DocumentArrowDownIcon,
        NoSymbolIcon,
    },
    props: {
        tasks: Object,
        now: String,
        errors: Object,
    },
    setup(props) {},
};
</script>
<!-- 2024-10-21 00:00:00 -->
