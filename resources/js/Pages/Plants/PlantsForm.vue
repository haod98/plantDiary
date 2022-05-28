<script>
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";

export default {
    data() {
        return {
            firstName: "",
        };
    },
    methods: {
        submit() {
            Inertia.post("/plants/store", this.firstName);
        },
    },
};
</script>
<template>
    <form @submit.prevent>
        <label for="plantName">Plant Name:</label>
        <input v-model="plantName" type="text" />
        <button type="submit" @click="submit"></button>
    </form>
</template>
