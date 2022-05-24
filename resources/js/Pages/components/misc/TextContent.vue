<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        textContent: String,
    },
});
</script>

<template>
    <p class="mb-5">{{ textContent }}</p>
</template>
