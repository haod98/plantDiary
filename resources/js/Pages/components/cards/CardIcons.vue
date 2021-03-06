<script>
import { defineComponent } from "vue";
import WaterPopUp from "./WaterPopUp.vue";
import SunPopUp from "./SunPopUp.vue";
import sunImagePath from "../../../../assets/svg/sun.svg";

export default defineComponent({
    data() {
        return {
            MAX_WATER_DROPS: 3,
            MIN_WATER_DROPS: 0,
            waterDropsIndex: 1,
            showWaterPopUp: false,
            showSunPopUp: false,
            sunImagePath,
        };
    },
    methods: {
        toggleWaterPopUp() {
            this.showWaterPopUp = true;
        },
        toggleSunPopUp() {
            this.showSunPopUp = true;
        },
        updateWaterIndex(index) {
            this.waterDropsIndex = index;
        },
        closePopUp() {
            this.showWaterPopUp = false;
            this.showSunPopUp = false;
        },
        getSunIconPath(iconPath) {
            this.sunImagePath = iconPath;
        },
    },
    props: {
        openWaterPopUp: Boolean,
        openSunPopUp: Boolean,
    },
    mounted() {
        this.openWaterPopUp ? (this.showWaterPopUp = true) : "";
        this.openSunPopUp ? (this.showSunPopUp = true) : "";
    },
    components: { WaterPopUp, SunPopUp },
});
</script>
<template>
    <div
        v-if="showWaterPopUp || showSunPopUp"
        @click="closePopUp"
        class="fixed left-0 top-0 z-10 h-full w-full"
    ></div>
    <div class="relative mt-3 flex items-center justify-between">
        <button class="flex cursor-pointer gap-1" @click="toggleWaterPopUp">
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
        </button>
        <WaterPopUp
            :isPopUpOpen="showWaterPopUp"
            @updateWaterIndex="updateWaterIndex"
        />
        <SunPopUp
            :isPopUpOpen="showSunPopUp"
            @iconPath="getSunIconPath"
            @closePopUp="closePopUp"
        />
        <img
            @click="toggleSunPopUp"
            :src="sunImagePath"
            alt="A sun icon"
            class="absolute left-2/4 h-8 -translate-x-2/4 cursor-pointer"
        />
        <div class="w-24">
            <div class="relative">
                <p class="text-md w-[100%] px-2 py-1 text-white">3 days</p>
                <div
                    class="absolute top-0 -z-10 h-full w-1/4 rounded-lg bg-sky-400"
                ></div>
                <div
                    class="absolute top-0 -z-20 h-full w-full rounded-lg bg-gray-300"
                ></div>
            </div>
        </div>
    </div>
</template>
