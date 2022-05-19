<template>
 <Head title="Locations" />
 <body class="px-4 py-8 flex items-center justify-center">
        <div class="max-w-4xl  xl:w-3/4 2xl:w-4/5 w-full">
            <div class="px-4 md:px-10 py-4 md:py-7">
                <Breadcrumbs :items="breadcrumbs" />
                <div class="sm:flex items-center justify-between">
                </div>
            </div>
            <div class="py-12">
                <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                    <p class=" flex justify-center ml-6 mb-3 text-xl font-bold text-blue-900">{{ harbour.name }}</p>
                    <div class="my-3 sm:mt-0">
                        <ButtonAdd>
                            <Link :href="route('harbours.location.create', harbour.id)" class="text-white">Lisa asukoht</Link>
                        </ButtonAdd>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 ">
                            <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-center font-bold">
                                        <td class=" px-6 py-4 text-gray-700 text-base">Asukoht</td>
                                        <!-- <td class=" px-6 py-4 text-gray-700 text-base"></td> -->
                                    </tr>
                                </thead>
                                <tr class="border-b-2 border-t-2" v-for="location in locations" :key="location.id">
                                    <td class="">
                                        <Link class="flex items-center p-1 justify-center hover:bg-blue-200 text-sm font-semibold" :href="route('locations.show', location.id)" key="location.id">
                                            {{ location.name }}
                                        </Link>
                                    </td>
                                    <!-- <td class=" flex justify-end">
                                        <ButtonEdit class="mr-2">
                                            <Link >Muuda</Link>
                                        </ButtonEdit>
                                        <ButtonDelete @click="destroy(location.id)">
                                            Eemalda
                                        </ButtonDelete>
                                    </td> -->
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
    components: { Breadcrumbs }, layoutName: "Authenticated",
    computed: {
        breadcrumbs() {
            return [
                {
                    label: "Sadamad",
                    url: route('harbours.index')
                },
                {
                    label: name,
                    // url: route('harbours.index')
                },
            ];
        }
    }
};
</script>
<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3"
import { inject } from '@vue/runtime-core';
import Breadcrumbs from '@/js/Components/Breadcrumbs.vue';


const route = inject("route")
const props = defineProps({
    locations: {
        type: Array, 
    },
    harbour: {
        type: Object,
    }
});
// console.log(props.locations)
</script>
