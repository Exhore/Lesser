<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
};
</script>

<template>
    <Link :href="'/'">
        <img
            src="/assets/logo.svg"
            alt="Logo"
            class="animate-in fade-in-0 duration-1000"
        />
    </Link>
</template>
