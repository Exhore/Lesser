<script>
export default {
    mounted() {
        this.switchTheme();
    },
    methods: {
        switchTheme() {
            const html = document.querySelector("html");
            const isLightOrAuto =
                localStorage.getItem("hs_theme") === "light" ||
                (localStorage.getItem("hs_theme") === "auto" &&
                    !window.matchMedia("(prefers-color-scheme: dark)").matches);
            const isDarkOrAuto =
                localStorage.getItem("hs_theme") === "dark" ||
                (localStorage.getItem("hs_theme") === "auto" &&
                    window.matchMedia("(prefers-color-scheme: dark)").matches);

            if (isLightOrAuto && html.classList.contains("dark"))
                html.classList.remove("dark");
            else if (isDarkOrAuto && html.classList.contains("light"))
                html.classList.remove("light");
            else if (isDarkOrAuto && !html.classList.contains("dark"))
                html.classList.add("dark");
            else if (isLightOrAuto && !html.classList.contains("light"))
                html.classList.add("light");
        },
    },
};
</script>

<template>
    <input
        data-hs-theme-switch=""
        class="relative w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 ring-1 ring-transparent focus:border-gray-700 focus:ring-gray-700 focus:outline-none appearance-none before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 after:absolute after:end-1.5 after:top-[calc(50%-0.40625rem)] after:w-[.8125rem] after:h-[.8125rem] after:bg-no-repeat after:bg-[right_center] after:bg-[length:.8125em_.8125em] after:transform after:transition-all after:ease-in-out after:duration-200 after:opacity-70 checked:after:start-1.5 checked:after:end-auto"
        type="checkbox"
        id="darkSwitch"
    />
</template>
