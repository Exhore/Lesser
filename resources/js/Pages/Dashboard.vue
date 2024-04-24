<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Crud from "@/Components/Crud.vue";

defineProps({
    videos: Array,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Crud :videos="videos" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
