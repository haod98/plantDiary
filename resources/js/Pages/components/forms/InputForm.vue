<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        inputAttribute: String,
        inputLabel: String,
        inputType: {
            type: String,
            default: "text",
        },
    },
});
</script>
<template>
    <label class="font-semibold" :for="inputAttribute">
        {{ inputLabel }}:</label
    >
    <input
        class="focus:ring-plantDiary-50 mb-3 rounded-md border-2 border-gray-700 py-2 px-3 placeholder:mx-3 placeholder:text-sm placeholder:font-light focus:outline-none focus:ring"
        :type="inputType"
        :name="inputAttribute"
        :id="inputAttribute"
        :placeholder="`Your ${inputLabel}`"
    />
</template>
