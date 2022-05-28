<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Head } from "@inertiajs/inertia-vue3";
import AppLayout from "../../Layouts/AppLayout.vue";

export default {
    setup() {
        const form = useForm({
            plantName: "",
            description: "",
            daysToWater: "",
            waterCount: "",
            sun: "",
        });
        return { form };
    },
    components: { AppLayout, Head },
};
</script>
<template>
    <AppLayout>
        <Head title="New Plant" />
        <form
            @submit.prevent="form.post(route('plants.store'))"
            class="flex flex-col gap-4 p-4"
        >
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
            <button type="submit">Submit</button>
        </form>
    </AppLayout>
</template>
