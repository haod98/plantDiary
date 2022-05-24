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
        class="decoration-plantDiary-100 block py-2 text-center text-xl uppercase text-black underline decoration-4"
    >
        {{ buttonText }}
    </a>
</template>
