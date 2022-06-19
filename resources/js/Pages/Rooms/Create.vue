<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";
import JetButton from "../../Jetstream/Button.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";

export default {
    components: {
        AppLayout,
        Link,
        Head,
        JetButton,
        JetInput,
        JetLabel,
    },
    setup() {
        const form = useForm({
            name: "",
        });

        return { form };
    },
    props: {
        errors: Object,
    },
};
</script>
<template>
    <Head title="Create room" />
    <AppLayout>
        <h2>Create rooms</h2>
        <form @submit.prevent="form.post(route('rooms.store'))">
            <div>
                <JetLabel for="name" value="Room name:" />
                <JetInput v-model="form.name" type="text" id="name" />
                <p class="text-red-700" v-if="errors.name">
                    {{ errors.name }}
                </p>
            </div>
            <JetButton>Create</JetButton>
        </form>
    </AppLayout>
</template>
