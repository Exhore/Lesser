<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link
    },
};
</script>

<template>
    <Link :href="'/'">
    <img src="/assets/logo.svg" alt="Logo" class="w-64 h-auto -mt-40" />
    </Link>
</template>
