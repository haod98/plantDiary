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
        <form @submit.prevent>
            <div>
                <label for="name">Room name:</label>
                <input v-model="form.name" type="text" id="name" />
                <p class="text-red-700" v-if="errors.name">
                    {{ errors.name }}
                </p>
            </div>
            <button @click="updateRoom">Update</button>
            <button @click="deleteRoom">Delete</button>
        </form>
    </AppLayout>
</template>
