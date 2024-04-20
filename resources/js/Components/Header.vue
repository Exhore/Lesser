<script>
import { ref, provide } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import QueryForm from "@/Components/QueryForm.vue";

export default {
    components: {
        ApplicationLogo,
        QueryForm,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
    },
    setup(props) {
        let showForm = ref(true);
        provide("showForm", showForm);

        return { ...props, showForm };
    },
};
</script>

<template>
    <div class="gradient-background w-full">
        <!-- Content -->
        <div class="h-screen flex flex-col">
            <div
                class="w-full h-screen animate-in fade-in-0 slide-in-from-bottom duration-1000 -mt-20"
            >
                <div class="h-full flex flex-col justify-center">
                    <div
                        class="-mt-40 max-w-4xl w-full text-center mx-auto px-4 sm:px-6 lg:px-8"
                        v-show="showForm"
                    >
                        <ApplicationLogo
                            class="w-64 h-auto inline-flex mb-10"
                        />

                        <h1
                            class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white"
                        >
                            Welcome to Lesser.
                        </h1>
                        <p class="mt-3 text-gray-600 dark:text-gray-400">
                            Your youtube video summarizer
                        </p>
                    </div>

                    <!-- input url query component -->
                    <QueryForm />
                    <!-- end url query component -->
                </div>

                <footer
                    class="mt-auto max-w-4xl text-center mx-auto px-4 sm:px-6 lg:px-8"
                >
                    <p class="text-xs text-gray-600 dark:text-gray-500">
                        Nelson Rivera. 2024 DAW. MIT license.
                    </p>

                    <div class="text-center">
                        <!-- Social Brands -->
                        <div class="mt-3 space-x-2">
                            <a
                                class="inline-flex justify-center items-center size-10 text-center text-blue-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800"
                                href="https://github.com/Exhore/Lesser"
                            >
                                <svg
                                    class="flex-shrink-0 size-3.5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>

<style>
.gradient-background {
    background: linear-gradient(1deg, #f9f9f9, #bac9ff);
    background-size: 400% 400%;

    -webkit-animation: AnimationName 28s ease infinite;
    -moz-animation: AnimationName 28s ease infinite;
    animation: AnimationName 28s ease infinite;
}

@-webkit-keyframes AnimationName {
    0% {
        background-position: 51% 0%;
    }

    50% {
        background-position: 50% 100%;
    }

    100% {
        background-position: 51% 0%;
    }
}

@-moz-keyframes AnimationName {
    0% {
        background-position: 51% 0%;
    }

    50% {
        background-position: 50% 100%;
    }

    100% {
        background-position: 51% 0%;
    }
}

@keyframes AnimationName {
    0% {
        background-position: 51% 0%;
    }

    50% {
        background-position: 50% 100%;
    }

    100% {
        background-position: 51% 0%;
    }
}
</style>
