<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import AppLayout from "../../Layouts/AppLayout.vue";
import { format } from "date-fns";
import PlantDashboard from "../components/dashboardCards/PlantDashboard.vue";
import { calculateRemainingDays } from "../../helpers";
export default {
    components: {
        Head,
        AppLayout,
        Link,
        PlantDashboard,
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
    data() {
        return {
            calculateRemainingDays,
        };
    },
};
</script>

<template>
    <Head :title="room.name" />
    <AppLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ room.name }}
            </h2>
        </template>
        <p v-if="plants.length === 0">No plants in {{ room.name }}</p>
        <div v-for="plant in plants" :key="plant.id">
            <PlantDashboard
                :title="plant.name"
                :description="plant.description"
                :daysToWater="calculateRemainingDays(plant.next_water)"
                :waterCount="plant.water_count"
                :sun="plant.sun"
                :plantImg="plant.plant_images"
                :defaultDays="plant.days_to_water"
                :plantId="plant.id"
            />
        </div>
    </AppLayout>
</template>
