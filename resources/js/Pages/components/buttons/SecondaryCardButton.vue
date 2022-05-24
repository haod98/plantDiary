<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        buttonTitle: {
            type: String,
            default: "Snooze",
        },
    },
});
</script>

<template>
    <button
        class="rounded-2xl bg-gray-300 px-4 py-3 font-semibold uppercase tracking-wider text-white transition duration-300 hover:bg-gray-400 hover:ease-in-out"
    >
        {{ buttonTitle }}
    </button>
</template>
