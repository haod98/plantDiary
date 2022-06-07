<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        AppLayout,
        Link,
        Head,
    },
    setup(props) {
        const form = useForm({
            name: props.room.name,
        });

        function updateRoom() {
            console.log("test");
            Inertia.put(route("rooms.update", props.room.id), form);
        }
        function deleteRoom() {
            Inertia.delete(route("rooms.update", props.room.id), form);
        }
        return { form, updateRoom, deleteRoom };
    },
    props: {
        room: {
            type: Object,
        },
    },
};
</script>
<template>
    <Head title="Create room" />
    <AppLayout>
        <h2>Create rooms</h2>
        <form @submit.prevent>
            <label for="name">Room name:</label>
            <input v-model="form.name" type="text" id="name" />
            <button @click="updateRoom">Update</button>
            <button @click="deleteRoom">Delete</button>
        </form>
    </AppLayout>
</template>
