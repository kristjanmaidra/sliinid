<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button type="type" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-800 rounded-lg hover:bg-red-800 focus:outline-none dark:bg-red-600 dark:hover:bg-red-700">
        <slot />
    </button>
</template>
