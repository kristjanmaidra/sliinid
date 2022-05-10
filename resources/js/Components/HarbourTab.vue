<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="w-64 mt-1 mb-1 pt-1 pb-1 hover:bg-sky-700 text-lg rounded-md text-center text-slate-200 bg-gray-800">
        <slot />
    </button>
</template>
