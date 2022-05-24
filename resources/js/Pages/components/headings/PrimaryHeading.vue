<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        title: String,
    },
});
</script>

<template>
    <h1 class="text-5xl font-semibold">{{ title }}</h1>
</template>
