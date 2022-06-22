<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";
import JetButton from "../../Jetstream/Button.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";
import SecondaryHeadingVue from "../components/headings/SecondaryHeading.vue";

export default {
    components: {
        AppLayout,
        Link,
        Head,
        JetButton,
        JetInput,
        JetLabel,
        SecondaryHeadingVue,
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
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create room
            </h2>
        </template>
        <form
            @submit.prevent="form.post(route('rooms.store'))"
            class="flex flex-col gap-4 p-4"
        >
            <div class="flex flex-col">
                <JetLabel for="name" value="Room name:" />
                <JetInput v-model="form.name" type="text" id="name" />
                <p class="text-red-700" v-if="errors.name">
                    {{ errors.name }}
                </p>
            </div>
            <div class="flex justify-center">
                <JetButton>Create room</JetButton>
            </div>
        </form>
    </AppLayout>
</template>
