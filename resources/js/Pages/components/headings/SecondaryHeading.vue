<script>
import { defineComponent } from "vue";
export default defineComponent({
    props: {
        title: String,
    },
});
</script>

<template>
    <h2 class="text-3xl font-bold uppercase">{{ title }}</h2>
</template>
