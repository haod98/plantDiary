<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Head } from "@inertiajs/inertia-vue3";
import AppLayout from "../../Layouts/AppLayout.vue";
import JetButton from "../../Jetstream/Button.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";
import { loadImage, formatDate } from "@/helpers.js";
import { format } from "date-fns";
import { ref } from "vue";
import JetDialogModal from "@/Jetstream/DialogModal.vue";

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
            Inertia.post(route("plants.update", props.plant.id), {
                ...form.data(),
                _method: "put",
            });
        }
        function deletePlant() {
            Inertia.delete(route("plants.destroy", props.plant.id), form);
        }
        function deleteImage(id) {
            Inertia.delete(route("plantsImage.destroy", id));
        }
        const roomsExists = props.rooms.length !== 0;
        const imagesExists =
            props.images !== undefined && props.images.length !== 0;

        const confirmDeletion = () => {
            confirmingDeletion.value = true;
        };

        const closeModal = () => {
            confirmingDeletion.value = false;
        };

        const confirmingDeletion = ref(false);

        return {
            form,
            plantPropExists,
            roomsExists,
            imagesExists,
            loadImage,
            formatDate,
            confirmingDeletion,
            format,
            createPlant,
            updatePlant,
            deletePlant,
            confirmDeletion,
            closeModal,
            deleteImage,
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
        errors: {
            type: Object,
        },
    },
    components: {
        AppLayout,
        Head,
        JetButton,
        JetInput,
        JetLabel,
        JetDialogModal,
    },
};
</script>
<template>
    <AppLayout>
        <Head title="New Plant" />
        <template #header>
            <h2
                v-if="$page.url === '/plants/create'"
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Create plant
            </h2>
            <h2
                v-else-if="$page.url.startsWith('/plants/')"
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Edit {{ plant.name }}
            </h2>
        </template>
        <form
            @submit.prevent
            class="flex flex-col items-center justify-center gap-4 p-4"
        >
            <div class="w-[90vw] max-w-[650px]">
                <div class="flex flex-col">
                    <JetLabel for="plantName" value="Plant Name:" />
                    <JetInput
                        id="plantName"
                        v-model="form.plantName"
                        type="text"
                    />
                    <p class="text-red-700" v-if="errors.plantName">
                        {{ errors.plantName }}
                    </p>
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
                    <p class="text-red-700" v-if="errors.description">
                        {{ errors.description }}
                    </p>
                </div>
                <div class="flex flex-col">
                    <JetLabel for="days-to-water" value="Days to water" />
                    <JetInput
                        id="days-to-water"
                        v-model="form.daysToWater"
                        type="number"
                        min="0"
                    />
                </div>
                <div class="flex flex-col">
                    <JetLabel for="water_count" value="How much water:" />
                    <select
                        class="rounded-md border-gray-300 shadow-sm focus:ring focus:ring-plantDiary-100 focus:ring-opacity-50"
                        v-model="form.waterCount"
                        name="water_count"
                        id="water_count"
                    >
                        <option value="0" selected>None</option>
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                    <p class="text-red-700" v-if="errors.water_count">
                        {{ errors.water_count }}
                    </p>
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
                    <p class="text-red-700" v-if="errors.sun">
                        {{ errors.sun }}
                    </p>
                </div>
                <div class="flex flex-col" v-if="roomsExists">
                    <JetLabel for="room_id" value="Which room" />
                    <select
                        class="rounded-md border-gray-300 shadow-sm focus:ring focus:ring-plantDiary-100 focus:ring-opacity-50"
                        v-model="form.roomId"
                        name="room_id"
                        id="room_id"
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
                    <p class="text-red-700" v-if="errors.image">
                        {{ errors.image }}
                    </p>
                </div>
                <div v-if="imagesExists" class="mt-3 flex gap-3">
                    <div
                        v-for="image in images"
                        :key="image.id"
                        class="flex flex-col items-center"
                    >
                        <img
                            :src="loadImage(image.image_path)"
                            alt=""
                            class="mb-2 h-24"
                        />
                        <form @submit.prevent>
                            <JetButton
                                @click="deleteImage(image.id)"
                                button-style-type="danger-border"
                                >Delete</JetButton
                            >
                        </form>
                        <p>{{ formatDate(image.created_at) }}</p>
                    </div>
                </div>
                <progress
                    v-if="form.progress"
                    :value="form.progress.percentage"
                    max="100"
                >
                    {{ form.progress.percentage }}%
                </progress>
                <JetDialogModal :show="confirmingDeletion" @close="closeModal">
                    <template #title> Delete {{ plant.name }} </template>
                    <template #content>
                        Are you sure you want to delete your plant:
                        <strong>{{ plant.name }} </strong>?
                    </template>
                    <template #footer>
                        <JetButton @click="closeModal"> Cancel </JetButton>
                        <JetButton
                            class="ml-3"
                            :class="{ 'opacity-25': form.processing }"
                            button-style-type="danger-border"
                            :disabled="form.processing"
                            @click="deletePlant"
                        >
                            Delete plant
                        </JetButton>
                    </template>
                </JetDialogModal>
                <div class="mt-3">
                    <div class="flex justify-center">
                        <JetButton
                            v-if="plant === undefined"
                            @click="createPlant"
                        >
                            Create plant
                        </JetButton>
                    </div>
                    <div class="flex justify-center gap-3">
                        <JetButton
                            button-style-type="danger-border"
                            v-if="plant !== undefined"
                            type="submit"
                            @click="confirmDeletion"
                        >
                            Delete
                        </JetButton>
                        <JetButton
                            v-if="plant !== undefined"
                            type="submit"
                            @click="updatePlant"
                        >
                            Save
                        </JetButton>
                    </div>
                </div>
            </div>
        </form>
    </AppLayout>
</template>
