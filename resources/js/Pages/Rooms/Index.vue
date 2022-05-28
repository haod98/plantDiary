<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";

export default {
    components: {
        AppLayout,
        Link,
        Head,
    },
};
</script>
<template>
    <Head title="Rooms" />
    <AppLayout>
        <Link :href="route('rooms.create')">
            <p>Create room</p>
        </Link>
        <h2>Rooms</h2>
    </AppLayout>
</template>
