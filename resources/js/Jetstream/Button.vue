<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center rounded-md border border-transparent bg-plantDiary-100 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-plantDiary-150 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-plantDiary-150 disabled:opacity-25"
    >
        <slot />
    </button>
</template>
