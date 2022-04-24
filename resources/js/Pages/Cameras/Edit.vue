<template>
 <body class="px-4 py-8 flex flex-col items-center justify-center">
        <div class="xl:w-3/4 2xl:w-4/5 w-full">
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="sm:flex items-center justify-between">
                    <div class="mt-4 sm:mt-0">
                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 inline-flex sm:ml-3 items-start justify-end px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <Link href="/cameras" class="text-white">Back</Link>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="my-3">Redigeeri kaamerat</h3>
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
                    <div>
                        <input type="file" @input="form.image = $event.target.files[0]" id="image" name="image" class="block w-full transition duration-150 ease-in-out">
                    </div>
                </div>
                <div>
                    <button type="submit" class="px-4 py-2 bg-green-400 hover:bg-green-600 rounded-lg text-white">Muuda</button>
                </div>
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
        const form = useForm({
              id: props.camera.id,
              name: props.camera.name,
              image: props.camera.image,
              description: props.camera.description,
              model: props.camera.model,
              price: props.camera.price,
              view_angle: props.camera.view_angle,
              focus_distance: props.camera.focus_distance,
              ip: props.camera.ip,
              switche_id: props.camera.switche_id,
            });
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
