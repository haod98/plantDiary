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
        class="bg-plantDiary-50 hover:bg-plantDiary-100 flex flex-grow justify-center rounded-2xl px-4 py-3 font-semibold uppercase tracking-wider text-white transition duration-300 hover:ease-in-out"
    >
        {{ buttonTitle }}
    </button>
</template>
