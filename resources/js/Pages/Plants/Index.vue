<template>
    <div v-for="plant in plants" :key="plant.id">
        <PlantDashboard
            :title="plant.name"
            :description="plant.description"
            :daysToWater="plant.days_to_water"
            :waterCount="plant.water_count"
            :sun="plant.sun"
            :plantImg="plant.plant_images[0].image_path"
        />
        <Link :href="route('plants.edit', plant.id)">
            <JetButton buttonStyleType="edit"> Edit</JetButton>
        </Link>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import PlantDashboard from "../components/dashboardCards/PlantDashboard.vue";
import JetButton from "../../Jetstream/Button.vue";
export default {
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
