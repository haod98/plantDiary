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
        class="outline-plantDiary-100 text-plantDiary-100 duration-600 hover:bg-plantDiary-100 hover:outline-plantDiary-100 rounded-full bg-white px-8 py-3 font-semibold uppercase tracking-widest outline outline-2 transition ease-in-out hover:text-white"
        >{{ buttonText }}</a
    >
</template>
