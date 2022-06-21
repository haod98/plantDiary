<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        buttonTitle: {
            type: String,
            default: "Water now",
        },
    },
});
</script>

<template>
    <button
        class="flex w-full flex-grow justify-center rounded-2xl bg-plantDiary-50 px-4 py-3 font-semibold uppercase tracking-wider text-white transition duration-300 hover:bg-plantDiary-100 hover:ease-in-out"
    >
        {{ buttonTitle }}
    </button>
</template>
