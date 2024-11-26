<template>
    <div class="overflow-x-auto">
        <table
            class="min-w-full bg-white border border-gray-200 divide-y divide-black"
        >
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="font-bold px-6 py-3 text-center text-xs text-black uppercase tracking-wider"
                    >
                        id
                    </th>
                    <th
                        class="px-6 py-3 text-center text-xs font-bold text-black uppercase tracking-wider"
                    >
                        name
                    </th>
                    <th
                        class="px-6 py-3 text-center text-xs font-bold text-black uppercase tracking-wider"
                    >
                        skill
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr
                    class="bg-white justify-between hover:text-black w-full min-h-min py-4 px-4 border-b-2 border-neutral-100 items-center hover:bg-[#21252908]"
                    v-for="(continent, index) in continents"
                    :key="index"
                >
                    <td
                        class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-500"
                    >
                        {{ continent.id }}
                    </td>
                    <td
                        class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-500"
                    >
                        {{ continent.name }}
                    </td>
                    <td
                        class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-500"
                    >
                        {{ continent.skill }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script setup>
import { ref, watch, reactive } from "vue";

let continents = reactive([
    { id: 1, name: "Mehrzad", skill: "laravel" },
    { id: 2, name: "Sohrab", skill: "raect" },
    { id: 3, name: "Mohammad", skill: "flutter" },
    { id: 4, name: "Farzad", skill: "Vue.js" },
    { id: 5, name: "Zahra", skill: "Node.js" },
]);

console.log(continents);
</script>
