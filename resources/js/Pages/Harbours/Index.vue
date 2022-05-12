<template>
 <Head title="Harbours" />
 <body class="px-4 py-8 flex items-center justify-center">
        <div class="max-w-4xl  xl:w-3/4 2xl:w-4/5 w-full">
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="sm:flex items-center justify-between">
                    <div class="mt-4 sm:mt-0">
                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 inline-flex sm:ml-3 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <Link href="/harbours-create" class="text-white">Lisa sadam</Link>
                        </button>
                    </div>
                </div>
            </div>
            <div class="py-4">
                <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-center font-bold">
                                        <td class="px-6 py-4 text-xl text-blue-900">Sadam</td>
                                    </tr>
                                </thead>
                                <tr class="border-b-2 border-t-2" v-for="harbour in harbours" :key="harbour.id">
                                    <td class="">
                                        <Link class="flex items-center p-1 justify-center hover:bg-blue-200 text-sm font-semibold" :href="route('harbours.show', harbour.id)" key="harbour.id">
                                            {{ harbour.name }}
                                        </Link>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </body>
</template>
<script>
export default { layoutName: "Authenticated",
    components: {
        Head,
        Link
    }
};
</script>
<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3"
import { inject } from '@vue/runtime-core';

const route = inject("route")
const props = defineProps({
    harbours: {
        type: Array,
    }
})
</script>
