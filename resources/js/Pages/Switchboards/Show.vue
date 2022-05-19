<template>
 <Head title="Switchboards" />
 <body class="px-4 py-8 flex items-center justify-center">
        <div class="max-w-4xl  xl:w-3/4 2xl:w-4/5 w-full">
            <p class=" flex justify-center ml-6 mb-3 text-xl font-bold text-blue-900">{{ switchboard.name }}</p>
            <div class="py-12">
                <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                    <div class="mt-4 sm:mt-0">
                        <ButtonAdd>
                            <Link :href="route('switchboards.switches.create', switchboard.id)" class="text-white">Lisa switch</Link>
                        </ButtonAdd>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white mt-4">
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
                                <ButtonDelete @click="destroy(switches.id)">
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
