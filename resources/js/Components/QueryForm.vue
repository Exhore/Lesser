<script setup>
</script>

<template>
    <!-- Search -->
    <div class="mt-10 max-w-2xl w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative">
            <form action="/query" method="get" id="query">
                <input type="text"
                    class="p-4 block w-full border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="Paste a youtube video...">
                <div class="absolute top-1/2 end-2 -translate-y-1/2">
                </div>
            </form>
        </div>
    </div>
    <!-- End Search -->

</template>
