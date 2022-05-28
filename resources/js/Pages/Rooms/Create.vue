<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        AppLayout,
        Link,
        Head,
    },
    setup() {
        const form = useForm({
            name: "",
        });

        return { form };
    },
};
</script>
<template>
    <Head title="Create room" />
    <AppLayout>
        <h2>Create rooms</h2>
        <form @submit.prevent="form.post(route('rooms.store'))">
            <label for="name">Room name:</label>
            <input v-model="form.name" type="text" id="name" />
            <button>Submit</button>
        </form>
    </AppLayout>
</template>
