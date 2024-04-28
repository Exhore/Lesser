<script>
import { inject, watchEffect, getCurrentInstance } from "vue";
import useStore from "@/store";
import { router } from "@inertiajs/vue3";

export default {
    name: "CaptionsComponent",

    setup() {
        const showForm = inject("showForm");
        const instance = getCurrentInstance();
        const { outAnimation } = useStore();

        watchEffect(() => {
            if (instance.proxy.$page.props.flash.captionsMessage) {
                outAnimation.value = true;
                showForm.value = false;
            }
        });

        const copyText = () => {
            navigator.clipboard.writeText(
                instance.proxy.$page.props.flash.captionsMessage
            );
        };

        const goBack = () => {
            router.visit("/");
        };

        return { showForm, outAnimation, copyText, goBack };
    },
};
</script>

<template>
    <div v-if="$page.props.flash.captionsMessage" class="z-10">
        <div
            class="rounded-xl overflow-hidden shadow-2xl max-w-[75vw] w-fit flex m-auto"
        >
            <div
                class="flex justify-center overflow-auto bg-white py-10 px-10 text-pretty text-sm dark:bg-slate-800 dark:text-gray-400 dark:border-gray-700 dark:focus:ring-gray-600 w-full h-[75vh]"
            >
                <p>{{ $page.props.flash.captionsMessage }}</p>
            </div>
        </div>
        <div class="flex items-center justify-center w-full gap-x-5 mt-10">
            <button
                @click="goBack"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:hover:bg-neutral-800"
            >
                Go back
            </button>
            <button
                @click="copyText"
                type="button"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-blue-600 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-blue-500 dark:hover:bg-neutral-800"
            >
                Copy
            </button>
        </div>
    </div>
</template>
