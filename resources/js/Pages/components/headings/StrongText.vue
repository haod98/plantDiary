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
    <strong
        class="block text-center text-2xl font-semibold uppercase tracking-wide lg:text-3xl lg:font-bold"
    >
        {{ title }}
    </strong>
</template>
