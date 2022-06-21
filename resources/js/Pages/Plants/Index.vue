<template>
    <div v-for="plant in plants" :key="plant.id">
        <PlantDashboard
            :title="plant.name"
            :description="plant.description"
            :daysToWater="calculateRemainingDays(plant.next_water)"
            :waterCount="plant.water_count"
            :sun="plant.sun"
            :plantImg="getFirstPlantImage(plant.plant_images)"
            :defaultDays="plant.days_to_water"
            :plantId="plant.id"
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
import { differenceInDays } from "date-fns";
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
    methods: {
        getFirstPlantImage(image) {
            return image.length > 0 ? image[0].image_path : undefined;
        },
        calculateRemainingDays(nextTimeToWater) {
            if (nextTimeToWater === null) return null;
            return differenceInDays(new Date(nextTimeToWater), new Date()) + 1; // +1 so it also includes todays day.
        },
    },
};
</script>
