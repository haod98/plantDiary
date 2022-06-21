<script>
import { defineComponent } from "vue";
import PrimaryCardButton from "../buttons/PrimaryCardButton.vue";
import SecondaryCardButton from "../buttons/SecondaryCardButton.vue";
import { Inertia } from "@inertiajs/inertia";

export default defineComponent({
    props: {
        plantName: String,
        plantDescription: String,
        _isCollapsed: {
            type: Boolean,
            default: false,
        },
        hideDropDown: {
            type: Boolean,
            default: false,
        },
        plantId: Number,
    },
    components: { PrimaryCardButton, SecondaryCardButton },
    data() {
        return {
            isCollapsed: this._isCollapsed,
            form: {
                id: this.plantId ?? null,
            },
        };
    },
    methods: {
        collapseCard() {
            this.isCollapsed = !this.isCollapsed;
            this.$emit("collapseCard", this.isCollapsed);
        },
        castWater() {
            Inertia.put(route("plants.castWater"), this.form, {
                preserveScroll: true,
            });
        },
    },
    emits: ["collapseCard"],
});
</script>

<template>
    <h3 class="text-xl font-bold">{{ plantName }}</h3>
    <p
        class="card-description mb-3 transition-[height] duration-500"
        :class="isCollapsed ? 'h-0 overflow-hidden' : 'h-[5rem]'"
        data-cy="card-description"
    >
        {{ plantDescription }}
    </p>
    <div class="flex justify-between gap-3">
        <form @submit.prevent class="w-full">
            <PrimaryCardButton @click="castWater"></PrimaryCardButton>
        </form>
        <SecondaryCardButton></SecondaryCardButton>
    </div>
    <div class="mt-4 flex cursor-pointer justify-center">
        <button
            v-if="!hideDropDown"
            @click="collapseCard"
            data-cy="collapse-card-btn"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-3 transition duration-500 ease-in-out"
                :class="isCollapsed ? 'rotate-180' : ''"
                viewBox="0 0 276.38 157.93"
            >
                <path
                    class="fill-plantDiary-50"
                    d="M276.38 138.19c0 5.05-1.93 10.11-5.78 13.95-7.71 7.71-20.2 7.71-27.92 0L138.19 47.63 33.7 152.15c-7.71 7.71-20.2 7.71-27.92 0-7.71-7.71-7.71-20.2 0-27.92L124.23 5.78c7.71-7.71 20.2-7.71 27.92 0L270.6 124.23c3.87 3.84 5.78 8.9 5.78 13.96Z"
                />
            </svg>
        </button>
    </div>
</template>

<style scoped>
.card-description {
    line-height: 1rem;
}
</style>
