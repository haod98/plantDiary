<script>
import { defineComponent } from "vue";
import CardIcons from "./cards/CardIcons.vue";
import CardContent from "./cards/CardContent.vue";

const IMG_PATH = "./src/assets/img/";
export default defineComponent({
    components: { CardIcons, CardContent },
    props: {
        title: {
            type: String,
            default: "Monstera",
        },
        description: {
            type: String,
            default: `
        Lorem ipsum dolor sit amet, consectetur
        adipiscing elit, sed do eiusmod tempor
        incididunt ut labore. Lorem ipsum dolor sit amet, consectetur`,
        },
        plantImg: {
            type: String,
            default: "../../../assets/img/dummyImage.png",
        },
        altImg: {
            type: String,
            default: "An image of a monstera plant in a white pot.",
        },
        isCollapsed: {
            type: Boolean,
            default: false,
        },
        hideDropDown: {
            type: Boolean,
            default: false,
        },
        openWaterPopUp: Boolean,
        openSunPopUp: Boolean,
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
            class="gradient border-1 min-w-[290px] max-w-[360px] rounded-2xl border-gray-50 px-5 pt-2 pb-7 drop-shadow-xl"
        >
            <div class="mt-[6%] flex justify-center">
                <img
                    :src="plantImg"
                    :alt="altImg"
                    class="max-h-[320px] w-full max-w-[320px] rounded-2xl transition-all duration-500 ease-in-out"
                    :class="[collapseImg ? 'max-h-28 object-cover' : '']"
                />
            </div>
            <CardIcons
                :openWaterPopUp="openWaterPopUp"
                :open-sun-pop-up="openSunPopUp"
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
