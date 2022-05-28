<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import { format } from "date-fns";
export default {
    props: {
        plants: {
            type: Object,
        },
    },
    components: {
        AppLayout,
        Welcome,
    },
    methods: {
        formatDate(date) {
            return format(new Date(date), "dd.MM.yyyy");
        },
    },
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                My plants
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
        <div v-for="plant in plants" :key="plant.id">
            <p>Plant Name: {{ plant.name }}</p>
            <p>Plant Description: {{ plant.description }}</p>
            <p>Days to water: {{ plant.days_to_water }}</p>
            <p>Water: {{ plant.water_count }}</p>
            <p>Sun: {{ plant.sun }}</p>
            <p>Created at: {{ formatDate(plant.created_at) }}</p>
            <p>Created at: {{ plant.created_at }}</p>
            <br />
        </div>
    </AppLayout>
</template>
