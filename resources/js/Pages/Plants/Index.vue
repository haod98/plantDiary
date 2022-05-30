<template>
    <div v-for="plant in plants" :key="plant.id">
        <p>Plant Name: {{ plant.name }}</p>
        <p>Plant Description: {{ plant.description }}</p>
        <p>Days to water: {{ plant.days_to_water }}</p>
        <p>Water: {{ plant.water_count }}</p>
        <p>Sun: {{ plant.sun }}</p>
        <p>Created at: {{ formatDate(plant.created_at) }}</p>
        <br />
    </div>
</template>

<script>
import { format } from "date-fns";
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
};
</script>
