<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        title: String,
    },
    data() {
        return {
            addClasses: this.classes,
        };
    },
});
</script>

<template>
    <strong class="text-plantDiary-50 block text-5xl font-bold tracking-wide">
        {{ title }}
    </strong>
</template>

<style scoped>
strong {
    font-family: "new-order";
}
</style>
