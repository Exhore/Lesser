<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Footer from "@/Components/Footer.vue";
import Faq from "@/Components/Faq.vue";
import Instructions from "@/Components/Instructions.vue";
import Header from "@/Components/Header.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Head title="Welcome" />
    <div
        class="z-10 relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-blue-500 selection:text-white"
    >
        <div
            v-if="canLogin"
            class="sm:fixed sm:top-0 sm:end-0 p-6 text-end z-10"
        >
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
            >
                Dashboard</Link
            >
            <template v-else>
                <Link
                    href="#instructions"
                    class="py-2 px-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    Instruccions</Link
                >

                <Link
                    href="#faq"
                    class="ms-2 py-2 px-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    FAQ</Link
                >

                <Link
                    :href="route('login')"
                    class="ms-5 py-2 px-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-2 py-2 px-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    Register</Link
                >
            </template>
        </div>
        <!-- fin -->
        <Header />
    </div>
    <!-- second component -->
    <Instructions class="mt-20"></Instructions>
    <!-- third component -->
    <Faq></Faq>
    <!-- footer component -->
    <Footer class="mt-20"></Footer>
</template>
