<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useForm, usePage } from "@inertiajs/inertia-vue3"

let videoUrl = "";
let message = ref("");
const { props } = usePage();

const submitForm = async () => {
    if (props.auth && props.auth.user) {
        try {
            const response = await axios.post('/query', {
                videoUrl: videoUrl,
                _token: '{{ csrf_token() }}',
            });
            message.value = response.data.message;
        } catch (error) {
            console.error(error);
            message.value = error.response.data.message;
        }
    }
};


</script>
<template>
    <!-- Search -->
    <div class="mt-10 max-w-2xl w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative">
            <div v-if="$page.props.auth && $page.props.auth.user">
                <form @submit.prevent="submitForm" action="/query" method="post" id="query">
                    <input type="text" v-model="videoUrl"
                        class="p-4 block w-full border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                        placeholder="Paste a youtube video...">

                </form>
                <div>
                    <p>{{ message }}</p>
                </div>
            </div>
            <template v-else>
                <input type="text"
                    class="p-4 block w-full border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                    placeholder="Log in for use me!" disabled>
            </template>
        </div>
    </div>
    <!-- End Search -->
</template>
