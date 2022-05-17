<template>
 <Head title="Cameras" />
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
                                        <td class="border">Hind</td>
                                        <td class="border">Vaatenurk</td>
                                        <td class="border">Fookuskaugus</td>
                                        <td class="border">Kirjeldus</td> <!--user_pw-->
                                        <td class="border">Pilt</td>
                                    </tr>
                                </thead>
                                <tr v-for="camera in cameras" :key="camera.id" class="">
                                    <td class="border px-6 py-1">
                                        <Link class="" :href="`/cameras/${camera.id}/edit`">
                                        {{ camera.name }}
                                        </Link>
                                    </td>
                                    <td class="border px-6 py-1">{{ camera.ip }}</td>
                                    <td class="border px-6 py-1">{{ camera.model }}</td>
                                    <td class="border px-6 py-1">{{ camera.price }}</td>
                                    <td class="border px-6 py-1">{{ camera.view_angle }}</td>
                                    <td class="border px-6 py-1">{{ camera.focus_distance }}</td>
                                    <td class="border px-6 py-1">{{ camera.description }}</td>
                                    <td class="border px-6 py-1"><img :src="camera.image" class="w-12 h-12 rounded"></td>
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
        InertiaTable,
    },
    methods: {
         destroy(id) {
            if (confirm('Oled sa kindel, et tahad kaamerat eemaldada?')) {
                // this.$inertia.delete(`/cameras/${id}`)
                this.$inertia.delete(route("cameras.destroy", id));
            }
        }
    },
};
</script>
<script setup>
import InertiaTable from 'inertia-table'
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3"
import { Inertia } from '@inertiajs/inertia';

defineProps({
  cameras: Array
})
</script>
