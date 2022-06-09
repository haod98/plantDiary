<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";

export default {
    components: {
        AppLayout,
        Link,
        Head,
    },
    props: {
        rooms: {
            type: Object,
        },
    },
    methods: {
        isRoomEmpty(rooms) {
            return Object.keys(rooms).length === 0;
        },
    },
};
</script>
<template>
    <Head title="Rooms" />
    <AppLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                My rooms
            </h2>
        </template>
        <Link :href="route('rooms.create')">
            <p>Create room</p>
        </Link>
        <h2>Your rooms</h2>
        <p v-if="isRoomEmpty(rooms)">Your rooms list is empty</p>
        <div v-for="room in rooms" :key="room.id">
            <Link :href="route('rooms.show', room.id)">{{ room.name }}</Link>
            <Link :href="route('rooms.edit', room.id)">Edit</Link>
        </div>
    </AppLayout>
</template>
