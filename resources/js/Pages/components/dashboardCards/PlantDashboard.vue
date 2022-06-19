<script>
import { defineComponent } from "vue";
import CardIcons from "../dashboardCards/CardIcons.vue";
import CardContent from "../dashboardCards/CardContent.vue";

const IMG_PATH = "./src/assets/img/";
export default defineComponent({
    components: { CardIcons, CardContent },
    props: {
        title: String,
        description: String,
        plantImg: String,
        altImg: String,
        daysToWater: Number,
        waterCount: Number,
        sun: Number,
        openWaterPopUp: Boolean,
        openSunPopUp: Boolean,
        isCollapsed: {
            type: Boolean,
            default: false,
        },
        hideDropDown: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            IMG_PATH,
            collapseImg: false,
        };
    },
    methods: {
        collapseCard(collapseState) {
            this.collapseImg = collapseState;
        },
    },
    mounted() {
        this.collapseImg = this.isCollapsed;
    },
});
</script>

<template>
    <div
        class="mb-3 flex justify-center"
        :class="$attrs.class"
        data-cy="plant-card"
    >
        <div
            class="gradient border-1 min-w-[350px] max-w-[360px] rounded-2xl border-gray-50 px-5 pt-2 pb-7 drop-shadow-xl"
        >
            <div class="mt-[6%] flex justify-center">
                <img
                    :src="
                        plantImg !== null
                            ? '/plantImages?image=' +
                              encodeURIComponent(plantImg)
                            : ''
                    "
                    :alt="altImg"
                    class="max-h-[320px] w-full max-w-[320px] rounded-2xl transition-all duration-500 ease-in-out"
                    :class="[collapseImg ? 'max-h-28 object-cover' : '']"
                />
            </div>
            <CardIcons
                :water-count="waterCount"
                :days-to-water="daysToWater"
                :openWaterPopUp="openWaterPopUp"
                :open-sun-pop-up="openSunPopUp"
                :sunLevel="sun"
            />
            <CardContent
                :plantName="title"
                :plantDescription="description"
                :_isCollapsed="isCollapsed"
                :hideDropDown="hideDropDown"
                @collapseCard="collapseCard"
            />
        </div>
    </div>
</template>
