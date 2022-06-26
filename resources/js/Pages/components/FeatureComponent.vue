<script>
import { defineComponent } from "vue";
import SupportHeading from "./headings/SupportHeading.vue";
import SecondaryHeading from "./headings/SecondaryHeading.vue";
import TextContent from "./misc/TextContent.vue";
import PlantCardComponent from "./PlantCardComponent.vue";
export default defineComponent({
    components: {
        SecondaryHeading,
        TextContent,
        PlantCardComponent,
        SupportHeading,
    },
    data() {
        return {
            features: [
                {
                    supHeading: "Simple",
                    heading: "All your plants in one place",
                    description: `Loosing the overview by having too much plants?
                     PlantDiary will help you out with that. Having all your plants in one single place is easier than ever.
                     With PlantDiary you can create a card with all the important information about your houseplants
                     `,
                },
                {
                    supHeading: "Track",
                    heading: "Keep track of everything",
                    description: `Keeping track of all your plants is easier than ever! "How much water does this plant need?", "Does this plant need sun?",
                    "When do I have to water it again?", "What are the important notes again for this houseplant?" You will never forget these kind of questions with PlantDiary`,
                },
                {
                    supHeading: "Growth",
                    heading: "See how your plants grow",
                    description: `Ever wondered how much you plants have grown over the time? With PlantDiary you do not have to wonder anymore. You can easily upload images of your houseplants
                    and see how it has developed. `,
                },
            ],
        };
    },
});
</script>

<template>
    <!-- First Feature Section -->
    <section
        class="mb-7 md:grid lg:grid-cols-12 lg:justify-center lg:gap-2"
        id="simple"
    >
        <div
            class="lg:col-start-1 lg:col-end-7 lg:flex lg:flex-col lg:justify-center 2xl:col-start-2"
        >
            <SupportHeading :title="features[0].supHeading"></SupportHeading>
            <SecondaryHeading :title="features[0].heading"></SecondaryHeading>
            <TextContent :textContent="features[0].description"></TextContent>
        </div>
        <div
            class="relative lg:col-start-8 lg:col-end-13 2xl:col-start-7 2xl:col-end-12"
            data-cy="first-feature"
        >
            <PlantCardComponent
                :hide-drop-down="true"
                plant-img="1"
            ></PlantCardComponent>
            <PlantCardComponent
                plantImg="2"
                altImg="An image of a ficus plant in a white pot"
                class="absolute top-0 left-2/4 -z-10 scale-90 opacity-40"
                :hide-drop-down="true"
            ></PlantCardComponent>
            <PlantCardComponent
                plantImg="3"
                altImg="An image of a ficus plant in a white pot"
                class="absolute top-0 right-2/4 -z-10 scale-90 opacity-40"
                :hideDropDown="true"
            ></PlantCardComponent>
        </div>
    </section>
    <!-- Second Feature Section -->
    <section class="mb-7 lg:grid lg:grid-cols-12">
        <div
            class="md:order-2 lg:col-start-7 lg:col-end-13 lg:flex lg:flex-col lg:justify-center 2xl:col-end-12"
        >
            <SupportHeading :title="features[1].supHeading"></SupportHeading>
            <SecondaryHeading :title="features[1].heading"></SecondaryHeading>
            <TextContent :textContent="features[1].description"></TextContent>
        </div>
        <div class="relative lg:order-1 lg:col-start-1 lg:col-end-7">
            <PlantCardComponent
                :isCollapsed="true"
                :openWaterPopUp="true"
                :hideDropDown="true"
                plant-img="1"
            />
            <PlantCardComponent
                plant-img="1"
                :isCollapsed="true"
                :openSunPopUp="true"
                :hideDropDown="true"
            />
        </div>
    </section>
    <!-- Third Feature Section -->
    <section class="mb-7 lg:grid lg:grid-cols-12">
        <div
            class="lg:col-start-1 lg:col-end-6 lg:flex lg:flex-col lg:justify-center xl:col-start-2 xl:col-end-7"
        >
            <SupportHeading :title="features[2].supHeading"></SupportHeading>
            <SecondaryHeading :title="features[2].heading"></SecondaryHeading>
            <TextContent :textContent="features[2].description"></TextContent>
        </div>
        <div class="mb-7 lg:col-start-7 lg:col-end-9 xl:col-end-10">
            <p class="mb-2 text-center text-2xl">Week 1</p>
            <PlantCardComponent
                plantImg="4"
                title="Snake plant"
                altImg="A young snake plant in a white pot"
                :hideDropDown="true"
            ></PlantCardComponent>
        </div>
        <div class="lg:col-start-11 lg:col-end-13 xl:col-start-10">
            <p class="mb-2 text-center text-2xl">Week 6</p>
            <PlantCardComponent
                plantImg="5"
                title="Snake plant"
                altImg="A big snake plant on the floor in a black pot"
                :hideDropDown="true"
            ></PlantCardComponent>
        </div>
    </section>
</template>
