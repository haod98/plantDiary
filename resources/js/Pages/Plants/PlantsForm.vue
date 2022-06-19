<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Head } from "@inertiajs/inertia-vue3";
import AppLayout from "../../Layouts/AppLayout.vue";
import JetButton from "../../Jetstream/Button.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";
import { loadImage, formatDate } from "@/helpers.js";
import { format } from "date-fns";

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
            image: null,
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
        const roomsExists = props.rooms.length !== 0;
        const imagesExists = props.images.length !== 0;

        return {
            form,
            plantPropExists,
            roomsExists,
            imagesExists,
            loadImage,
            formatDate,
            format,
            createPlant,
            updatePlant,
            deletePlant,
        };
    },
    props: {
        plant: {
            type: Object,
        },
        rooms: {
            type: Object,
        },
        images: {
            type: Object,
        },
    },
    components: { AppLayout, Head, JetButton, JetInput, JetLabel },
};
</script>
<template>
    <AppLayout>
        <Head title="New Plant" />
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                My plants
            </h2>
        </template>
        <form @submit.prevent class="flex flex-col gap-4 p-4">
            <div class="flex flex-col">
                <JetLabel for="plantName" value="Plant Name:" />
                <JetInput id="plantName" v-model="form.plantName" type="text" />
            </div>
            <div class="flex flex-col">
                <JetLabel for="description" value="Plant Description:" />
                <textarea
                    name="description"
                    id="description"
                    cols="30"
                    rows="10"
                    v-model="form.description"
                    class="rounded-md border-gray-300 shadow-sm focus:ring focus:ring-plantDiary-100 focus:ring-opacity-50"
                ></textarea>
            </div>
            <div class="flex flex-col">
                <JetLabel for="days-to-water" value="Days to water" />
                <JetInput
                    id="days-to-water"
                    v-model="form.daysToWater"
                    type="number"
                />
            </div>
            <div class="flex flex-col">
                <JetLabel for="description" value="Plant Description:" />
                <select
                    class="rounded-md border-gray-300 shadow-sm focus:ring focus:ring-plantDiary-100 focus:ring-opacity-50"
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
                <JetLabel for="sun" value="How much sun" />
                <select
                    class="rounded-md border-gray-300 shadow-sm focus:ring focus:ring-plantDiary-100 focus:ring-opacity-50"
                    v-model="form.sun"
                    name="sun"
                    id="sun"
                >
                    <option value="0" selected>None</option>
                    <option value="1">Shadow</option>
                    <option value="2">Half-shadow</option>
                    <option value="3">Sun</option>
                </select>
            </div>
            <div class="flex flex-col" v-if="roomsExists">
                <JetLabel for="room-id" value="Which room" />
                <select
                    class="rounded-md border-gray-300 shadow-sm focus:ring focus:ring-plantDiary-100 focus:ring-opacity-50"
                    v-model="form.roomId"
                    name="room-id"
                    id="room-id"
                >
                    <option
                        v-for="room in rooms"
                        :key="room.id"
                        :value="room.id"
                    >
                        {{ room.name }}
                    </option>
                </select>
            </div>
            <div class="flex flex-col">
                <JetLabel for="images"> Add images </JetLabel>
                <input
                    type="file"
                    id="images"
                    name="images"
                    @input="form.image = $event.target.files[0]"
                />
            </div>
            <div v-if="imagesExists">
                <div v-for="image in images" :key="image.id">
                    <img
                        :src="loadImage(image.image_path)"
                        alt=""
                        class="h-32"
                    />
                    <p>Picture taken: {{ formatDate(image.created_at) }}</p>
                </div>
            </div>
            <progress
                v-if="form.progress"
                :value="form.progress.percentage"
                max="100"
            >
                {{ form.progress.percentage }}%
            </progress>
            <JetButton v-if="plant === undefined" @click="createPlant">
                Create
            </JetButton>
            <JetButton
                v-if="plant !== undefined"
                type="submit"
                @click="updatePlant"
            >
                Save
            </JetButton>
            <JetButton
                button-style-type="danger"
                v-if="plant !== undefined"
                type="submit"
                @click="deletePlant"
            >
                Delete
            </JetButton>
        </form>
    </AppLayout>
</template>
