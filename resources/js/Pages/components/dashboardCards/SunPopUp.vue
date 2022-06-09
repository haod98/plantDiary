<script setup>
import { defineComponent } from "vue";
import noSun from "../../../../assets/svg/no-sun.svg";
import halfSun from "../../../../assets/svg/half-shadow.svg";
import sun from "../../../../assets/svg/sun.svg";

defineComponent({
    data() {
        return {
            svg: "w-8 cursor-pointer",
        };
    },
    props: {
        isPopUpOpen: Boolean,
    },
    methods: {
        getSunIconPath($event) {
            this.$emit("iconPath", $event.target.src);
        },
        closePopUp() {
            this.$emit("closePopUp");
        },
    },
});
</script>

<template>
    <div
        v-if="isPopUpOpen"
        class="gradient absolute left-2/4 z-10 flex w-48 -translate-x-2/4 flex-col items-center rounded-2xl px-6 py-2 shadow-xl"
    >
        <p class="font-semibold">How much sun?</p>
        <div class="flex items-center justify-center gap-2">
            <img
                :src="noSun"
                alt="No sun icon"
                :class="svg"
                @click="
                    getSunIconPath($event);
                    closePopUp();
                "
            />
            <img
                :src="halfSun"
                alt="Half shadow sun icon"
                :class="svg"
                @click="
                    getSunIconPath($event);
                    closePopUp();
                "
            />
            <img
                :src="sun"
                alt="Sun icon"
                :class="svg"
                @click="
                    getSunIconPath($event);
                    closePopUp();
                "
            />
        </div>
    </div>
</template>
