<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Head } from "@inertiajs/inertia-vue3";
import AppLayout from "../../Layouts/AppLayout.vue";

export default {
    setup(props) {
        const plantPropExists = props.plant !== undefined;
        const form = useForm({
            plantName:
                plantPropExists && props.plant.name !== undefined
                    ? props.plant.name
                    : "",
            description:
                plantPropExists && props.plant.description !== undefined
                    ? props.plant.description
                    : "",
            daysToWater:
                plantPropExists && props.plant.days_to_water !== undefined
                    ? props.plant.days_to_water
                    : "",
            waterCount:
                plantPropExists && props.plant.water_count !== undefined
                    ? props.plant.water_count
                    : "",
            roomId: "",
            sun:
                plantPropExists && props.plant.sun !== undefined
                    ? props.plant.sun
                    : "",
        });

        function createPlant() {
            Inertia.post(route("plants.store"), form);
        }
        function updatePlant() {
            console.log("update");
            Inertia.put(route("plants.update", props.plant.id), form);
        }
        function deletePlant() {
            Inertia.delete(route("plants.destroy", props.plant.id), form);
        }
        return { form, plantPropExists, createPlant, updatePlant, deletePlant };
    },
    props: {
        plant: {
            type: Object,
        },
        rooms: {
            type: Object,
        },
    },
    components: { AppLayout, Head },
};
</script>
<template>
    <AppLayout>
        <Head title="New Plant" />
        <form @submit.prevent class="flex flex-col gap-4 p-4">
            <div class="flex flex-col">
                <label for="plantName">Plant Name:</label>
                <input v-model="form.plantName" id="plantName" type="text" />
            </div>
            <div class="flex flex-col">
                <label for="description">Plant Description:</label>
                <textarea
                    name="description"
                    id="description"
                    cols="30"
                    rows="10"
                    v-model="form.description"
                ></textarea>
            </div>
            <div class="flex flex-col">
                <label for="days-to-water">Days to water:</label>
                <input
                    v-model="form.daysToWater"
                    type="number"
                    id="days-to-water"
                />
            </div>
            <div class="flex flex-col">
                <label for="water-count">How much water:</label>
                <select
                    v-model="form.waterCount"
                    name="water-count"
                    id="water-count"
                >
                    <option value="0" selected>None</option>
                    <option value="1">Low</option>
                    <option value="2">Medium</option>
                    <option value="3">High</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="sun">How much sun?</label>
                <select v-model="form.sun" name="sun" id="sun">
                    <option value="0" selected>None</option>
                    <option value="1">Shadow</option>
                    <option value="2">Half-shadow</option>
                    <option value="3">Sun</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="room-id">Which room:</label>
                <select v-model="form.roomId" name="room-id" id="room-id">
                    <option
                        v-for="room in rooms"
                        :key="room.id"
                        :value="room.id"
                    >
                        {{ room.name }}
                    </option>
                </select>
            </div>
            <button
                v-if="plant === undefined"
                type="submit"
                @click="createPlant"
            >
                Create
            </button>
            <button
                v-if="plant !== undefined"
                type="submit"
                @click="updatePlant"
            >
                Save
            </button>
            <button
                v-if="plant !== undefined"
                type="submit"
                @click="deletePlant"
            >
                Delete
            </button>
        </form>
    </AppLayout>
</template>
