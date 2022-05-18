<template>
    <div class="max-w-screen-lg w-full px-6 lg:mx-auto mt-12">
        <!-- <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 inline-flex sm:ml-3 items-start justify-end px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
            <Link :href="route('locations.show', location.id)" class="text-white">Tagasi</Link>
        </button> -->
        <div class="flex flex-col w-full justify-center items-center">
            <!-- <h1 class="my-3 text-xl font-semibold">Muuda kilpi</h1> -->
            <p class=" flex justify-center ml-6 mb-3 text-xl font-bold text-blue-900">{{ switchboard.name }}</p>
            <form  @submit.prevent="submit" class="bg-white shadow-md m-2 p-2 rounded">
                <div class="">
                    <input class="rounded active:border-inherit mb-2" name="name" v-model="form.name" type="text">
                </div>
                <ButtonEdit type>
                    Muuda
                </ButtonEdit>
            </form>
        </div>
    </div>
</template>
<script>

import { useForm } from '@inertiajs/inertia-vue3'
import { inject } from '@vue/runtime-core';
import { Head } from "@inertiajs/inertia-vue3"
import { Link } from "@inertiajs/inertia-vue3"

export default { 
    components: {
        Head,
        Link
   },
    setup(props) {
        const form = useForm({
            id: props.switchboard.id,
            name: props.switchboard.name,
            });
        return {form};
    },

    props: {
        switchboard: Object,
    },

    methods: {
        submit() {
            this.form.post(route('switchboards.update', this.switchboard.id));
        },
    },
};

</script>