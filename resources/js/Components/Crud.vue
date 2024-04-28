<script setup>
import { Inertia } from "@inertiajs/inertia";
import { defineProps, ref } from "vue";
import DialogModal from "./DialogModal.vue";
import {
    TextInput,
    InputError,
    PrimaryButton,
    SecondaryButton,
} from "@inertiajs/inertia-vue3";

defineProps({
    videos: Array,
});

const closeModal = () => {
    showModal.value = false;
};

const showModal = ref(false);
const videoDescription = ref("");
console.log(videoDescription.value);

const viewSummarize = (description) => {
    videoDescription.value = description;
    showModal.value = true;
};

const deleteEntry = (id) => {
    Inertia.delete(`/dashboard/videos/${id}`)?.then(() => {
        // After the video is deleted, fetch the updated list of videos
        Inertia.reload({ only: ["videos"] });
    });
};
</script>

<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                        class="flex items-center px-6 py-4 text-gray-900 w-fit flex-wrap dark:text-white"
                    >
                        <!-- aqui podría ir la imagen del thumbail del video -->
                        <div class="ps-3">
                            <div class="line-clamp-2">
                                {{ video.title }}
                            </div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <!-- summarize aqui -->
                        <span>{{
                            video.description.substring(0, 20) + "..."
                        }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <!-- actions aqui -->
                        <div class="flex gap-x-5">
                            <button @click="viewSummarize(video.description)">
                                <img
                                    src="assets/view.svg"
                                    alt="watch summarize"
                                />
                            </button>
                            <button @click="deleteEntry(video.id)">
                                <img
                                    src="assets/bin.svg"
                                    alt="watch summarize"
                                />
                            </button>
                        </div>
                    </td>
                    <DialogModal :show="showModal" @close="closeModal">
                        <template #title>
                            {{ video.url }}
                        </template>

                        <template #content>
                            {{ video.description }}
                        </template>

                        <template #footer>
                            <PrimaryButton @click="closeModal">
                                Close
                            </PrimaryButton>
                            <SecondaryButton @click="closeModal">
                                Cancel
                            </SecondaryButton>
                        </template>
                    </DialogModal>
                </tr>
            </tbody>
        </table>
    </div>
</template>
