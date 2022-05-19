<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button type="type" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-800 rounded-lg hover:bg-blue-800  dark:bg-blue-600 dark:hover:bg-blue-700">
        <slot />
    </button>
</template>
