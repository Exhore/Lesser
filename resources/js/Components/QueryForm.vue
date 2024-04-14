<script setup>
import { computed } from "vue";
import { usePage, useForm, router } from "@inertiajs/vue3";
import ISearch from "./elementals/ISearch.vue";
import CaptionsComponent from "./CaptionsComponent.vue";

defineProps({ errors: Object });

const form = useForm({
    videoUrl: null,
});

const page = usePage();
const isAuth = computed(() => page.props.auth.user);

const submitForm = async () => {
    if (isAuth) {
        try {
            const response = router.post("/query", form);
            page.props.captionsMessage = response.data.captionsMessage;
        } catch (error) {
            console.error(error);
        }
    }
};
</script>
<template>
    <!-- Search -->
    <div class="mt-10 max-w-2xl w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div v-if="$page.props.auth && $page.props.auth.user">
            <form @submit.prevent="form.post('/query')">
                <div class="relative">
                    <button
                        type="submit"
                        class="absolute inset-y-0 h-full right-0 px-4 text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none"
                    >
                        <ISearch class="fill-white dark:fill-dark" />
                    </button>
                    <input
                        type="text"
                        v-model="form.videoUrl"
                        class="p-4 block w-full border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                        placeholder="Paste a youtube video..."
                    />
                </div>
            </form>
            <div v-if="$page.props.flash.status" class="alert">
                {{ $page.props.flash.status }}
                <div v-if="$page.props.captionsMessage">
                    <!--  insertar animaciones para desvanecer todo -->
                    <CaptionsComponent
                        :captionsMessage="$page.props.captionsMessage"
                    />
                </div>
            </div>
            <div v-if="$page.props.errors.videoUrl">
                {{ $page.props.errors.videoUrl }}
            </div>
        </div>
        <template v-else>
            <input
                type="text"
                class="p-4 block w-full border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="Log in for use me!"
                disabled
            />
        </template>
    </div>
    <!-- End Search -->
</template>
