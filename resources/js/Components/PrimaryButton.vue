<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
});
</script>

<template>
    <button
        :type="type"
        class="py-2 px-5 inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-800 text-white hover:bg-blue-900 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 dark:bg-white dark:text-gray-800"
    >
        <slot />
    </button>
</template>
