<script setup>
defineProps({
    videos: Array,
});

const deleteEntry = () => {
    console.log("delete entry");
};
const viewSummarize = () => {
    console.log("view summarize");
};
</script>

<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div
            class="flex items-center justify-center flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900"
        >
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div
                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none"
                >
                    <svg
                        class="w-4 h-4 text-gray-500 dark:text-gray-400"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 20 20"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                        />
                    </svg>
                </div>
                <input
                    type="text"
                    id="table-search-users"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for video title"
                />
            </div>
        </div>
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="p-4"></th>
                    <th scope="col" class="px-6 py-3">Video title</th>
                    <th scope="col" class="px-6 py-3">Summarize</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="video in videos"
                    :key="video.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                >
                    <td class="w-4 p-4"></td>
                    <th
                        scope="row"
                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                    >
                        <!-- aqui podría ir la imagen del thumbail del video -->
                        <div class="ps-3">
                            <div class="text-base font-semibold">
                                {{ video.title }}
                            </div>
                            <div class="font-normal text-gray-500">
                                <!-- contenido aqui -->{{ video.content }}
                            </div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <!-- summarize aqui -->{{ video.summarize }}
                    </td>
                    <td class="px-6 py-4">
                        <!-- actions aqui -->
                        <div class="flex gap-x-5">
                            <button @click="deleteEntry(video.id)">
                                <img
                                    src="assets/bin.svg"
                                    alt="watch summarize"
                                />
                            </button>
                            <button @click="viewSummarize(video.id)">
                                <img
                                    src="assets/view.svg"
                                    alt="watch summarize"
                                />
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
