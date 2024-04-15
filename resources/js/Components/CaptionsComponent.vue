<script>
export default {
    name: "CaptionsComponent",
};
</script>

<template>
    <div
        class="animate-out fade-out mt-10 bg-white py-2 px-10 text-sm rounded-xl shadow-2xl dark:bg-slate-800 dark:text-gray-400 dark:border-gray-700 dark:focus:ring-gray-600"
        v-if="$page.props.flash.captionsMessage"
    >
        {{ $page.props.flash.captionsMessage }}
    </div>
</template>
