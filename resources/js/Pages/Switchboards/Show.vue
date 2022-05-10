<template>
 <Head title="Switchboards" />
 <body class="px-4 py-8 flex items-center justify-center">
        <div class="xl:w-3/4 2xl:w-4/5 w-full">
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="sm:flex items-center justify-between">
                    <div class="mt-4 sm:mt-0">
                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 inline-flex sm:ml-3 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <Link :href="route('switchboards.switches.create', switchboard.id)" class="text-white">Lisa switch</Link>
                        </button>
                    </div>
                </div>
            </div>
            <div class="py-2">
                <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
                        <table class="w-full text-sm text-left text-gray-900 dark:text-gray-900">
                            <thead>
                                <tr class="font-bold">
                                    <td class="px-6 py-2 text-gray-700 text-base">Switch</td>
                                    <!-- <td class="border">IP</td>
                                    <td class="border">Kasutajaimi</td>
                                    <td class="border">Parool</td>
                                    <td class="border">Mudel</td>
                                    <td class="border">Ühendatud seadmed</td>
                                    <td class="border">Pordid</td>
                                    <td class="border">Kuhu ühendatud</td>
                                    <td class="border">Kirjeldus</td>
                                    <td class="border">Pildid</td>
                                    <td class="border">Action</td> -->
                                </tr>
                            </thead>
                            <tr class="border-b-2 border-t-2" v-for="switches in switches" :key="switches.id">
                                <td class=" px-6 py-1">
                                    <Link class="hover:bg-blue-200" :href="route('switches.show', switches.id)" key="switches.id">
                                        {{ switches.name }}
                                    </Link>
                                </td>
                                <!-- <td class=" px-6 py-1">{{ switches.ip }}</td>
                                <td class=" px-6 py-1">{{ switches.username }}</td>
                                <td class=" px-6 py-1">{{ switches.password }}</td>
                                <td class=" px-6 py-1">{{ switches.model }}</td>
                                <td class=" px-6 py-1">{{ switches.devices }}</td>
                                <td class=" px-6 py-1">{{ switches.ports }}</td>
                                <td class=" px-6 py-1">{{ switches.switch_ports }}</td>
                                <td class=" px-6 py-1">{{ switches.description }}</td>
                                <td class=" px-6 py-1"><img :src="switches.image" class="w-12 h-12 rounded"></td> -->
                                <td class=" flex gap-2 justify-center">
                                <!-- <ButtonEdit>
                                    <Link :href="route('switches.edit', switches.id)" key="switches.id" class="text-white">Muuda</Link>
                                </ButtonEdit> -->
                                <ButtonDelete @click="destroy(camera.id)">
                                    Eemalda
                                </ButtonDelete>
                                </td>
                            </tr>
                        </table>
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
    switches: {
        type: Array, 
    },
    switchboard: {
        type: Object,
    }
});
// console.log(props.switches)
</script>
