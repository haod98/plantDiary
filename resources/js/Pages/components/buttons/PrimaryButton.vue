<script>
import { defineComponent } from "vue";
export default defineComponent({
    props: {
        buttonText: String,
    },
});
</script>
<template>
    <a
        href=""
        class="bg-plantDiary-100 hover:bg-plantDiary-150 rounded-full px-8 py-3 font-semibold uppercase tracking-widest text-white transition duration-300 hover:ease-in-out"
        >{{ buttonText }}</a
    >
</template>
