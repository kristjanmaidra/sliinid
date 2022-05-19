<template>
 <Head title="Switches" />
 <body class="py-10 flex items-center justify-center">
        <div class="pt-8 xl:w-3/4 2xl:w-4/5 w-full">
            <div class="">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
                            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-900">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr class="text-center font-bold">
                                        <td class="border">Nimi</td>
                                        <td class="border">IP</td>
                                        <td class="border">Mudel</td>
                                        <td class="border">Parool</td>
                                        <td class="border">Kasutajanimi</td>
                                        <td class="border">Seadmed</td>
                                        <td class="border">Pordid</td>
                                        <td class="border">Kirjeldus</td> 
                                        <td class="border">Pilt</td>
                                    </tr>
                                </thead>
                                <tr v-for="switches in switches" :key="switches.id" class="">
                                    <!-- <td class="border px-6 py-1">
                                        <Link class="" :href="`/switches/${switches.id}/edit`">
                                        {{ switches.name }}
                                        </Link>
                                    </td> -->
                                    <td class="border px-6 py-1">{{ switches.name }}</td>
                                    <td class="border px-6 py-1">{{ switches.ip }}</td>
                                    <td class="border px-6 py-1">{{ switches.model }}</td>
                                    <td class="border px-6 py-1">{{ switches.password }}</td>
                                    <td class="border px-6 py-1">{{ switches.username }}</td>
                                    <td class="border px-6 py-1">{{ switches.devices }}</td>
                                    <td class="border px-6 py-1">{{ switches.ports }}</td>
                                    <td class="border px-6 py-1">{{ switches.description }}</td>
                                    <td class="border px-6 py-1"><img :src="switches.image" class="w-12 h-12 rounded"></td>
                                    <!-- <td class="border flex gap-2 justify-center">
                                        <ButtonEdit>
                                            <Link :href="route('cameras.edit', camera.id)" key="camera.id" class="text-white">Muuda</Link>
                                        </ButtonEdit>
                                        <ButtonDelete @click="destroy(camera.id)">
                                            Eemalda
                                        </ButtonDelete>
                                    </td> -->
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
        Link,
    },
    methods: {
         destroy(id) {
            if (confirm()) {
                this.$inertia.delete(route("switches.destroy", id));
            }
        }
    },
};
</script>
<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3"

const props = defineProps({
    switches: {
        type: Array, 
    },
});
</script>
