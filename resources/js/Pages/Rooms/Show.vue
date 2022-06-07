<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import AppLayout from "../../Layouts/AppLayout.vue";
import { format } from "date-fns";
export default {
    components: {
        Head,
        AppLayout,
        Link,
    },
    props: {
        plants: {
            type: Object,
        },
        room: {
            type: Object,
        },
    },
    methods: {
        formatDate(date) {
            return format(new Date(date), "dd.MM.yyyy");
        },
        plantsIsEmpty() {
            console.log(plants.name);
        },
    },
};
</script>

<template>
    <Head :title="room.name" />
    <AppLayout>
        <h1>{{ room.name }}</h1>
        <p v-if="plants.length === 0">No Rooms</p>
        <div v-for="plant in plants" :key="plant.id">
            <p>Plant Name: {{ plant.name }}</p>
            <p>Plant Description: {{ plant.description }}</p>
            <p>Days to water: {{ plant.days_to_water }}</p>
            <p>Water: {{ plant.water_count }}</p>
            <p>Sun: {{ plant.sun }}</p>
            <p>Room: {{ plant.room_id }}</p>
            <p>Created at: {{ formatDate(plant.created_at) }}</p>
            <Link :href="route('plants.edit', plant.id)">Edit</Link>
            <br />
        </div>
        <!-- <p>{{ plants }}</p> -->
    </AppLayout>
</template>
