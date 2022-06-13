<template>
    <div v-for="plant in plants" :key="plant.id">
        <PlantDashboard
            :title="plant.name"
            :description="plant.description"
            :daysToWater="plant.days_to_water"
            :waterCount="plant.water_count"
            :sun="plant.sun"
        />
        <Link :href="route('plants.edit', plant.id)">
            <JetButton buttonStyleType="edit"> Edit</JetButton>
        </Link>
    </div>
</template>

<script>
import { format } from "date-fns";
import { Link } from "@inertiajs/inertia-vue3";
import PlantDashboard from "../components/dashboardCards/PlantDashboard.vue";
import JetButton from "../../Jetstream/Button.vue";
export default {
    methods: {
        formatDate(date) {
            return format(new Date(date), "dd.MM.yyyy");
        },
    },
    props: {
        plants: {
            type: Object,
        },
    },
    components: {
        Link,
        PlantDashboard,
        JetButton,
    },
};
</script>
