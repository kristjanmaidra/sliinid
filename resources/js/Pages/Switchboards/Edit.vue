<template>
    <div class="max-w-screen-lg w-full px-6 lg:mx-auto mt-12">
        <div class="flex flex-col w-full justify-center items-center">
            <h1 class="text-gray-500 text-2xl mb-6">New Blog Post</h1>
            <form class="flex flex-col w-full max-w-md gap-6" @submit.prevent="submit">
                <div class="flex flex-col">
                    <label for="tile">Title</label>
                    <input class="rounded active:border-inherit" name="description" v-model="form.name" type="text">
                </div>
                <button class="rounded w-full bg-gray-800 text-white font-bold uppercase px-2 py-1" type="submit">Submit</button>
            </form>
        </div>
    </div>
</template>
<script>

import { useForm } from '@inertiajs/inertia-vue3'
import { inject } from '@vue/runtime-core';

export default { 
    components: {
   },
    setup(props) {
        const form = useForm({
              id: props.switchboard.id,
              name: props.switchboard.name,
            });
        return {form};
    },
    props: {
        camera: Object,
    },

    methods: {
        submit() {
            this.form.post(route('switchboard.update', this.switchboard.id));
        },
    },
};
// const props = defineProps({
//     switchboard:{
//         type: Object,
//         default: null
//     }
// })
// const route = inject('route')
// const form = useForm({
//       id: props.switchboard.id,
//       name: props.switchboard.name,
//     });

// const submit = () => {
//     form.post(route("location.show", props.switchboard.id));
// }
</script>