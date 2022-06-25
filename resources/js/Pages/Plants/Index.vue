<template>
    <div
        class="md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5"
    >
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
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import PlantDashboard from "../components/dashboardCards/PlantDashboard.vue";
import JetButton from "../../Jetstream/Button.vue";
import { calculateRemainingDays } from "../../helpers";
export default {
    props: {
        plants: {
            type: Object,
        },
        isCollapsed: {
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
    },
    data() {
        return {
            calculateRemainingDays,
        };
    },
};
</script>
