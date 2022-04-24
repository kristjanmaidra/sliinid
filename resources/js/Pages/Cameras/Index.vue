<template>
 <Head title="Cameras" />
 <body class="py-8 flex items-center justify-center">
        <div class="xl:w-3/4 2xl:w-4/5 w-full">
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="sm:flex items-center justify-between">
                    <div class="mt-4 sm:mt-0">
                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 inline-flex sm:ml-3 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <Link href="/cameras-create" class="text-white">Lisa kaamera</Link>
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
                                        <td class="border">Nimi</td>
                                        <td class="border">IP</td>
                                        <td class="border">Mudel</td>
                                        <td class="border">Hind</td>
                                        <td class="border">Vaatenurk</td>
                                        <td class="border">Fookuskaugus</td>
                                        <td class="border">Kirjeldus</td> <!--user_pw-->
                                        <td class="border">Pilt</td>
                                        <td class="border"></td>
                                    </tr>
                                </thead>
                                <tr v-for="camera in cameras" :key="camera.id">
                                    <td class="border px-6 py-1">{{ camera.name }}</td>
                                    <td class="border px-6 py-1">{{ camera.ip }}</td>
                                    <td class="border px-6 py-1">{{ camera.model }}</td>
                                    <td class="border px-6 py-1">{{ camera.price }}</td>
                                    <td class="border px-6 py-1">{{ camera.view_angle }}</td>
                                    <td class="border px-6 py-1">{{ camera.focus_distance }}</td>
                                    <td class="border px-6 py-1">{{ camera.description }}</td>
                                    <td class="border px-6 py-1"><img :src="camera.image" class="w-12 h-12 rounded"></td>
                                    <td class="border">
                                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 inline-flex sm:ml-3 items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                                            <Link :href="route('cameras.edit', camera.id)" key="camera.id" class="text-white">Muuda</Link>
                                        </button>
                                        <button @click="destroy(camera.id)" class="focus:ring-2 focus:ring-offset-2 focus:ring-red-700 inline-flex text-white sm:ml-3 items-start justify-start px-6 py-3 bg-red-700 hover:bg-red-500 focus:outline-none rounded">Eemalda</button>
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
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3"
import { Inertia } from '@inertiajs/inertia';

defineProps({
  cameras: Array
})
</script>
