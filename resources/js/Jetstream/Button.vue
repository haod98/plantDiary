<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
    buttonStyleType: {
        type: String,
        default:
            "inline-flex items-center rounded-md border border-transparent bg-plantDiary-100 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-plantDiary-150 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-plantDiary-150 disabled:opacity-25",
    },
});
function changeStyleOfButton(buttonType) {
    switch (buttonType) {
        case "edit":
            return "inline-flex items-center rounded-md border border-transparent bg-gray-300 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-gray-500 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-gray-600 disabled:opacity-25";
        case "danger":
            return "inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-red-700 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-plantDiary-700 disabled:opacity-25";
        case "danger-border":
            return "inline-flex items-center rounded-md border border-solid border-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-red-700 text-white transition hover:text-white hover:bg-red-700 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-plantDiary-700 disabled:opacity-25";
        default:
            return "inline-flex items-center rounded-md border border-transparent bg-plantDiary-100 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-plantDiary-150 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-plantDiary-150 disabled:opacity-25";
    }
}
</script>

<template>
    <button :type="type" :class="changeStyleOfButton(buttonStyleType)">
        <slot />
    </button>
</template>
