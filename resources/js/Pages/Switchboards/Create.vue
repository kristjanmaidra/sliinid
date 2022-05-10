<template>
 <body class="px-4 py-8 flex flex-col items-center justify-center">
        <div class="xl:w-3/4 2xl:w-4/5 w-full">
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="sm:flex items-center justify-between">
                    <div class="mt-4 sm:mt-0">
                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 inline-flex sm:ml-3 items-start justify-end px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                            <Link :href="route('locations.show', location.id)" class="text-white">Tagasi</Link>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid place-content-center mt-10">
            <form @submit.prevent="submit" class="bg-white shadow-md m-2 p-2 rounded" action="">
                <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div>
                        <Input type="text" id="" name="name" v-model="form.name" class="w-full" />
                        <!-- <input type="hidden" name="harbour_id" value="{{ $harbour_id }}"> -->
                    </div>
                    <button type="submit" class="mt-2 px-4 py-2 bg-green-700 hover:bg-green-600 rounded-lg text-white">Lisa</button>
                </div>
            </form>
        </div>
    </body>
</template>
<script>
export default { layoutName: "Authenticated",
};

</script>
<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from '@inertiajs/inertia-vue3'
import { inject } from '@vue/runtime-core';

const route = inject('route')
const props = defineProps({
   location: {
        type: Object,
    },

})

const form = useForm({
      name: "",
    //   harbour_id: "",

      
    });

const submit = () => {
    form.post(route('locations.switchboard.store', props.location.id))
}
    

</script>
