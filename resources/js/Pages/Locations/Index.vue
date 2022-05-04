<template>
 <Head title="Locations" />
 <body class="px-4 py-8 flex items-center justify-center">
        <div class="xl:w-3/4 2xl:w-4/5 w-full">
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="sm:flex items-center justify-between">
                    <div class="mt-4 sm:mt-0">
                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 inline-flex sm:ml-3 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <Link href="/locations-create" class="text-white">Lisa asukoht</Link>
                        </button>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-center font-bold">
                                        <td class="border px-6 py-4">Asukoht</td>
                                        <td class="border px-6 py-4">Sadam</td>
                                    </tr>
                                </thead>
                                <tr v-for="location in locations" :key="location.id">
                                    <td class="border px-6 py-4">{{ location.name }}</td>
                                </tr>
                                <tr>

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

const props = defineProps({
    locations: {
        type: Array, 
        default: null,
    },
    harbours: {
        type: Array,
        default: null,
    }
});
</script>
