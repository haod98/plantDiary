<script>
import { defineComponent } from "vue";
import CardIcons from "../dashboardCards/CardIcons.vue";
import CardContent from "../dashboardCards/CardContent.vue";
import { loadImage } from "../../../helpers";
import { Link } from "@inertiajs/inertia-vue3";
import JetButton from "../../../Jetstream/Button.vue";
import Glide from "@glidejs/glide";

const IMG_PATH = "./src/assets/img/";
export default defineComponent({
    components: { JetButton, Link, CardIcons, CardContent },
    props: {
        title: String,
        description: String,
        plantImg: Array,
        altImg: String,
        daysToWater: Number,
        waterCount: Number,
        sun: Number,
        openWaterPopUp: Boolean,
        openSunPopUp: Boolean,
        plantId: Number,
        defaultDays: Number | null,
        isCollapsed: {
            type: Boolean,
            default: true,
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
            loadImage,
        };
    },
    methods: {
        collapseCard(collapseState) {
            this.collapseImg = collapseState;
        },
    },
    mounted() {
        this.collapseImg = this.isCollapsed;
        new Glide(this.$refs.glide, {
            // type: "carousel",
            startAt: 0,
            preView: 1,
        }).mount();
    },
});
</script>

<template>
    <div
        class="mb-3 flex scale-90 flex-col items-center justify-center gap-3"
        :class="$attrs.class"
        data-cy="plant-card"
    >
        <div
            class="gradient border-1 min-w-[350px] max-w-[360px] rounded-2xl border-gray-50 px-5 pt-2 pb-7 drop-shadow-xl"
        >
            <div class="mt-[6%] flex justify-center">
                <div class="glide" ref="glide">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <li v-for="image in plantImg" :key="image.id">
                                <img
                                    :src="loadImage(image.image_path)"
                                    :alt="altImg"
                                    class="max-h-[320px] w-full max-w-[320px] rounded-2xl transition-all duration-500 ease-in-out"
                                    :class="[
                                        collapseImg
                                            ? 'max-h-28 object-cover'
                                            : '',
                                    ]"
                                />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <CardIcons
                :water-count="waterCount"
                :days-to-water="daysToWater"
                :openWaterPopUp="openWaterPopUp"
                :open-sun-pop-up="openSunPopUp"
                :sunLevel="sun"
                :defaultDays="defaultDays"
            />
            <CardContent
                :plantName="title"
                :plantDescription="description"
                :_isCollapsed="isCollapsed"
                :hideDropDown="hideDropDown"
                :plantId="plantId"
                @collapseCard="collapseCard"
            />
        </div>

        <Link :href="route('plants.edit', plantId)" class="">
            <JetButton buttonStyleType="edit"> Edit</JetButton>
        </Link>
    </div>
</template>
