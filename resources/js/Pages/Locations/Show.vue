<template>
 <Head title="Switchboards" />
 <body class="px-4 py-8 flex items-center justify-center">
        <div class="max-w-4xl  xl:w-3/4 2xl:w-4/5 w-full">
            <p class=" flex justify-center ml-6 mb-3 text-xl font-bold text-blue-900">{{ location.name }}</p>
            <div class="py-12">
                <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                    <div class="my-3 sm:mt-0">
                        <ButtonAdd>
                            <Link :href="route('locations.switchboard.create', location.id)" class="text-white">Lisa kilp</Link>
                        </ButtonAdd>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 ">
                            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-900">
                                <thead>
                                    <tr class="font-bold">
                                        <td class="text-gray-700 text-base">Kilp</td>
                                    </tr>
                                </thead>
                                <tr class="border-b-2 border-t-2" v-for="switchboard in switchboards" :key="switchboard.id">
                                    <td class="">
                                        <Link class="hover:bg-blue-200" :href="route('switchboards.show', switchboard.id)" key="switchboard.id">
                                            {{ switchboard.name }}
                                        </Link>
                                    </td>
                                    <td class=" flex justify-end">
                                        <ButtonEdit class="mr-2">
                                            <Link :href="route('switchboards.edit', switchboard.id)" key="switchboard.id" >Muuda</Link>
                                        </ButtonEdit>
                                        <ButtonDelete @click="destroy(switchboard.id)">
                                            Eemalda
                                        </ButtonDelete>
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
    components: { Breadcrumbs }, layoutName: "Authenticated",
    computed: {
        breadcrumbs() {
            return [
                {
                    label: "Sadamad",
                    url: route('harbours.index')
                },
                {
                    // label: "Asukohad",
                    // url: route('locations.index')
                },
            ];
        }
    },
    methods: {
         destroy(id) {
            if (confirm('Oled sa kindel, et tahad sidekilpi eemaldada?')) {
                this.$inertia.delete(route("switchboards.destroy", id));
            }
        }
    },
};
</script>
<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { inject } from '@vue/runtime-core';
import Breadcrumbs from '@/js/Components/Breadcrumbs.vue';


const route = inject("route")
const props = defineProps({
    switchboards: {
        type: Array, 
    },
    location: {
        type: Object,
    }
});
// console.log(props.switchboards)

</script>
