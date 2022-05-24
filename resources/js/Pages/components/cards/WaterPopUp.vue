<script>
import { defineComponent } from "vue";

export default defineComponent({
    data() {
        return {
            MAX_WATER_DROPS: 3,
            MIN_WATER_DROPS: 0,
            waterDropsIndex: 1,
            showWaterPopUp: false,
            waterButton:
                "bg-sky-400 text-white font-bold px-2 min-w-[30px] max-w-[30px] rounded-lg text-2xl ml-2",
        };
    },
    props: {
        isPopUpOpen: Boolean,
    },
    methods: {
        reduceWater() {
            return this.waterDropsIndex <= this.MIN_WATER_DROPS
                ? (this.waterDropsIndex = this.MIN_WATER_DROPS)
                : this.waterDropsIndex--;
        },
        increaseWater() {
            return this.waterDropsIndex >= this.MAX_WATER_DROPS
                ? (this.waterDropsIndex = this.MAX_WATER_DROPS)
                : this.waterDropsIndex++;
        },
        toggleWaterPopUp() {
            this.showWaterPopUp = !this.showWaterPopUp;
        },
    },
});
</script>
<template>
    <div
        v-if="isPopUpOpen"
        class="gradient absolute -left-8 z-10 flex flex-col items-center rounded-2xl px-6 py-2 shadow-xl"
    >
        <p class="font-semibold">How much water?</p>
        <div class="flex items-center gap-2">
            <button
                @click="
                    reduceWater();
                    $emit('updateWaterIndex', waterDropsIndex);
                "
                class="ml-2 min-w-[30px] max-w-[30px] rounded-lg bg-sky-400 px-2 text-2xl font-bold text-white"
            >
                -
            </button>
            <svg
                v-for="singleDrop in MAX_WATER_DROPS"
                :key="singleDrop"
                class="h-6"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 11.934 15.462"
            >
                <path
                    d="M16,15.893c0-2.31,3.468-7.247,5.116-9.46a1.073,1.073,0,0,1,1.7,0c1.648,2.213,5.116,7.15,5.116,9.46a5.776,5.776,0,0,1-5.967,5.582A5.776,5.776,0,0,1,16,15.893Zm3.255,0a.544.544,0,0,0-1.085,0,3.675,3.675,0,0,0,3.8,3.563.506.506,0,1,0,0-1.01A2.627,2.627,0,0,1,19.255,15.893Z"
                    transform="translate(-16 -6.014)"
                    :class="
                        waterDropsIndex >= singleDrop
                            ? 'fill-sky-400'
                            : 'fill-gray-300'
                    "
                />
            </svg>
            <button
                @click="
                    increaseWater();
                    $emit('updateWaterIndex', waterDropsIndex);
                "
                class="ml-2 min-w-[30px] max-w-[30px] rounded-lg bg-sky-400 px-2 text-2xl font-bold text-white"
            >
                +
            </button>
        </div>
    </div>
</template>
