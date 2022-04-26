<template>
    <div :style="image" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0  ">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                image: {backgroundImage: "url(https://images.unsplash.com/photo-1542627476-e0b078f03d38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1974&q=80)"}
            };
        }
    };
</script>

<style>
    .image {

        background-repeat: no-repeat;
    }
</style>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
</script>
