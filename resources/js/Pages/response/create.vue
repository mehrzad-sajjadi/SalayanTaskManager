<template>
    <Head title="Create new Task" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                1 ثبت گزارش برای تسک {{ task.name }}
            </h2>
        </template>

        <div
            class="flex flex-col w-5/6 mx-auto my-16 border border-gray-500 rounded-lg"
        >
            <div
                class="flex flex-row items-center w-full min-h-min bg-[#21252908] border-b-2"
            >
                <p class="px-4 m-2 text-xl">ایجاد گزارش</p>
            </div>
            <div class="flex flex-col justify-between">
                <div>
                    <div class="mb-5 py-2 px-2 w-full">
                        <label
                            class="block mb-2 text-lg font-medium text-gray-900 dark:text-white"
                        >
                            متن گزارش
                        </label>
                        <input
                            type="text"
                            class="block w-[100%] p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            autofocus
                            v-model="form.report"
                        />
                        <p
                            v-if="$page.props.errors.report"
                            class="text-red-600"
                        >
                            {{ $page.props.errors.report }}
                        </p>
                        <label
                            class="mt-8 block mb-2 text-lg font-medium text-gray-900 dark:text-white"
                        >
                            فایل پیوست
                            <span class="text-sm"> (اختیاری) </span>
                        </label>
                        <input
                            class="bg-[#00fbff] rounded-lg px-5 py-3 cursor-pointer"
                            type="file"
                            name="image"
                            @change="sentImage"
                        />
                    </div>
                </div>

                <div class="flex flex-row justify-between mb-4">
                    <button
                        @click="submit"
                        class="h-9 px-4 m-2 text-lg duration-150 rounded focus:shadow-outline bg-white hover:bg-blue-600 text-blue-600 hover:text-white border border-blue-600 hover:border-transparent"
                    >
                        ثبت گزارش
                    </button>
                    <Link
                        :href="route('dashboard')"
                        type="submit"
                        as="button"
                        class="h-9 px-4 m-2 text-lg duration-150 rounded focus:shadow-outline bg-[#ffc107] hover:bg-[#ffe607] text-black border border-[#ffc107] hover:border-transparent"
                    >
                        انصراف
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import { Head, useForm, Link, usePage } from "@inertiajs/vue3";
import Dashboard from "@/Pages/Dashboard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Vue3PersianDatetimePicker from "vue3-persian-datetime-picker";
import DatePicker from "vue3-persian-datetime-picker";
const props = defineProps({
    task: Object,
});
const form = useForm({
    task_id: props.task.id,
    report: "",
    image: null,
});
function sentImage(event) {
    const file = event.target.files[0];
    form.image = file;
}

function submit() {
    form.post(route("response_store"), {
        forceFormData: true,
    });
}
</script>
