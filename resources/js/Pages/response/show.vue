<template>
    <Head title="Create new Task" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                جزئیات تسک {{ response.task_name }}
            </h2>
        </template>

        <div
            class="flex flex-col w-5/6 mx-auto my-16 border border-gray-500 rounded-lg"
        >
            <div class="flex flex-col justify-between">
                <div>
                    <div class="mb-5 py-2 px-2 w-full">
                        <label
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-white"
                        >
                            عنوان گزارش
                        </label>
                        <p class="bg-white text-md rounded-lg py-5 px-3">
                            {{ response.report }}
                        </p>
                        <!-- <img
                            class="size-40"
                            v-if="image_url"
                            :src="image_url"
                            :alt="response.id"
                        /> -->
                    </div>
                </div>

                <div class="flex flex-row justify-between mb-4">
                    <a
                        v-if="image_url"
                        :href="image_url"
                        :download="image_name"
                        as="button"
                        type="button"
                        class="h-8 px-4 flex items-center m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-500 hover:bg-blue-600 rounded-lg focus:shadow-outline"
                    >
                        دریافت گزارش
                        <ArrowDownTrayIcon class="size-5"></ArrowDownTrayIcon>
                    </a>

                    <Link
                        :href="route('user_show', response.task.user_id)"
                        type="button"
                        as="button"
                        class="h-9 px-4 m-2 text-lg duration-150 rounded focus:shadow-outline bg-[#ffc107] hover:bg-[#ffe607] text-black border border-[#ffc107] hover:border-transparent"
                    >
                        بازگشت
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import { Head, useForm, Link, usePage } from "@inertiajs/vue3";
import Dashboard from "@/Pages/Dashboard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Vue3PersianDatetimePicker from "vue3-persian-datetime-picker";
import DatePicker from "vue3-persian-datetime-picker";
import { ArrowDownTrayIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    response: Object,
    image_url: String,
    image_name: String,
});
</script>
