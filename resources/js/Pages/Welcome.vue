<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Footer from '@/Components/Footer.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Faq from '@/Components/Faq.vue';
import Instructions from '@/Components/Instructions.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean
});

components: {
    Instructions,
        Faq,
        Footer
}

</script>

<template>

    <Head title="Welcome" />
    <!-- estudiar como accede a la rutas para reestructurar el diseño -->
    <div
        class="gradient-background relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-blue-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:end-0 p-6 text-end z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">
            Dashboard</Link>

            <template v-else>
                <Link :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">
                Log in</Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">
                Register</Link>
            </template>
        </div>
        <!-- fin -->


        <!-- Content -->
        <div class="h-screen flex flex-col pb-6">
            <div class="h-full flex flex-col justify-center">
                <div class="-mt-40 max-w-4xl w-full text-center mx-auto px-4 sm:px-6 lg:px-8">
                    <ApplicationLogo class="w-64 h-auto inline-flex mb-10" />
                    <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
                        Welcome to Lesser.
                    </h1>
                    <p class="mt-3 text-gray-600 dark:text-gray-400">
                        Your youtube video summarizer
                    </p>
                </div>

                <!-- Search -->
                <div class="mt-10 max-w-2xl w-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="relative">
                        <input type="text"
                            class="p-4 block w-full border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            placeholder="Paste a youtube video...">
                        <div class="absolute top-1/2 end-2 -translate-y-1/2">
                        </div>
                    </div>
                </div>
                <!-- End Search -->
            </div>
            <!--  copyright footer -->
            <footer class="mt-auto max-w-4xl text-center mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-xs text-gray-600 dark:text-gray-500">Nelson Rivera. 2024 DAW. MIT license.</p>

                <div class="text-center">
                    <!-- Social Brands -->
                    <div class="mt-3 space-x-2">
                        <a class="inline-flex justify-center items-center size-10 text-center text-blue-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition dark:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-800"
                            href="https://github.com/Exhore/Lesser">
                            <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- second component -->
    <Instructions class="mt-20"></Instructions>
    <!-- third component -->
    <Faq></Faq>
    <!-- footer component -->
    <Footer class="mt-20"></Footer>
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
        background-position: 51% 0%
    }

    50% {
        background-position: 50% 100%
    }

    100% {
        background-position: 51% 0%
    }
}

@-moz-keyframes AnimationName {
    0% {
        background-position: 51% 0%
    }

    50% {
        background-position: 50% 100%
    }

    100% {
        background-position: 51% 0%
    }
}

@keyframes AnimationName {
    0% {
        background-position: 51% 0%
    }

    50% {
        background-position: 50% 100%
    }

    100% {
        background-position: 51% 0%
    }
}
</style>
