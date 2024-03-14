<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Footer from '@/Components/Footer.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Faq from '@/Components/Faq.vue';
import Instructions from '@/Components/Instructions.vue';
import QueryForm from '@/Components/QueryForm.vue';
import Header from '@/Components/Header.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean
});

components: {
    Instructions,
        Header,
        Faq,
        Footer
}

</script>

<template>

    <Head title="Welcome" />
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-blue-500 selection:text-white">
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
        <Header />
    </div>


    <!-- second component -->
    <Instructions class="mt-20"></Instructions>
    <!-- third component -->
    <Faq></Faq>
    <!-- footer component -->
    <Footer class="mt-20"></Footer>
</template>
