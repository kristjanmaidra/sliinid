<template>
 <body class="px-4 py-8 flex flex-col items-center justify-center">
        <div class="xl:w-3/4 2xl:w-4/5 w-full">
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="sm:flex items-center justify-between">
                    <div class="mt-4 sm:mt-0">
                        <ButtonAdd>
                            <Link :href="route('switches.show', switches.id)" class="text-white">Tagasi</Link>
                        </ButtonAdd>
                    </div>
                </div>
            </div>
        </div>
        <p class="font-semibold">Lisa kaamera</p>
        <div class="grid place-content-center mt-10">
            <form @submit.prevent="submit" enctype="multipart/form-data" class="bg-white shadow-md m-2 p-2 rounded" action="">
                <div class="grid grid-cols-3 gap-2 sm:col-span-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nimi</label>
                        <Input type="text" id="" name="name" v-model="form.name" class="w-full" />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Kasutajaimi</label>
                        <Input type="text" id="" name="username" v-model="form.username" class="w-full" />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Parool</label>
                        <Input type="text" id="" name="password" v-model="form.password" class="w-full" />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">IP</label>
                        <Input type="text" id="" name="ip" v-model="form.ip" class="w-full" />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Mudel</label>
                        <Input type="text" id="" name="model" v-model="form.model" class="w-full" />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Asukoht</label>
                        <Input type="text" id="" name="location" v-model="form.location" class="w-full" />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Fookuskaugus</label>
                        <Input type="text" id="" name="focus_distance" v-model="form.focus_distance" class="w-full" />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Hind</label>
                        <Input type="text" id="" name="price" v-model="form.price" class="w-full" />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Kirjeldus</label>
                        <Input type="text" id="" name="description" v-model="form.description" class="w-full" />
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Vaatenurk</label>
                        <Input type="text" id="" name="view_angle" v-model="form.view_angle" class="w-full" />
                    </div>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Pilt</label>
                    <input type="file" @input="form.image = $event.target.files[0]" id="image" name="image" class="mt-2 block w-full transition duration-150 ease-in-out">
                </div>
                <button type="submit" class="mt-2 px-4 py-2 bg-green-700 hover:bg-green-600 rounded-lg text-white">Lisa</button>
            </form>
        </div>
    </body>
</template>

<script>
export default { layoutName: "Authenticated",
};

</script>

<script setup>
import { Head } from "@inertiajs/inertia-vue3"
import { Link } from "@inertiajs/inertia-vue3"
import { useForm } from '@inertiajs/inertia-vue3'
import { inject } from '@vue/runtime-core';

const route = inject('route')
const props = defineProps({
   switches: {
        type: Object,
    },

})

const form = useForm({
        name: "",
        image: "",
        username: "",
        password: "",
        location: "",
        description: "",
        model: "",
        price: "",
        view_angle: "",
        focus_distance: "",
        ip: "",
    });

const submit = () => {
    form.post(route('switches.camera.store', props.switches.id), {
        onSuccess: () => form.reset()
    });
}
</script>
