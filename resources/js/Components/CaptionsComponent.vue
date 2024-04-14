<script>
export default {
    name: "CaptionsComponent",
    props: ["captionsMessage"],
};
</script>

<template>
    <p class="text-[6px]">{{ captionsMessage }}</p>
</template>
