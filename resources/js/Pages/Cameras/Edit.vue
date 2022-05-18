<template>
 <body class="px-4 py-8 flex flex-col items-center justify-center">
        <div class="xl:w-3/4 2xl:w-4/5 w-full">
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="sm:flex items-center justify-between">
                    <div class="mt-4 sm:mt-0">
                        <!-- <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 inline-flex sm:ml-3 items-start justify-end px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <Link :href="route('switches.show', switches.id)" class="text-white">Back</Link>
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- <h3 class="my-3 text-xl font-semibold">Muuda kaamerat</h3> -->
        <p class=" flex justify-center ml-6 mb-3 text-xl font-bold text-blue-900">{{ camera.name }}</p>
        <div class="grid place-content-center mt-10">
            <form @submit.prevent="submit" class="bg-white shadow-md m-2 p-2 rounded" action="">
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nimi</label>
                    <div>
                        <input type="text" id="title" name="name" v-model="form.name" class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Mudel</label>
                    <div>
                        <input type="text" id="title" name="name" v-model="form.model" class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Hind</label>
                    <div>
                        <input type="text" id="title" name="name" v-model="form.price" class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">IP</label>
                    <div>
                        <input type="text" id="title" name="name" v-model="form.ip" class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Vaatenurk</label>
                    <div>
                        <input type="text" id="title" name="name" v-model="form.view_angle" class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Fookuskaugus</label>
                    <div>
                        <input type="text" id="title" name="name" v-model="form.focus_distance" class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">Kirjeldus</label>
                    <div>
                        <input type="text" id="title" name="description" v-model="form.description" class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700"></label>
                    <div class="mt-2">
                        <input type="file" @input="form.image = $event.target.files[0]" id="image" name="image" class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <ButtonEdit type="submit" class="mt-2">
                    Muuda
                </ButtonEdit>
            </form>
        </div>
    </body>
</template>
<script>
import { Head } from "@inertiajs/inertia-vue3"
import { Link } from "@inertiajs/inertia-vue3"
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'


export default { 
    components: {
        Head,
        Link
    },

    setup(props) {
        const form = useForm(props.camera);
        return {form};
    },

    props: {
        camera: Object,
    },

    methods: {
        submit() {
            this.form.post(route('cameras.update', this.camera.id));
        },
    },
};


</script>
