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
                    description: `Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
          non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.`,
                },
                {
                    supHeading: "Track",
                    heading: "Keep track of everything",
                    description: `Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
          non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.`,
                },
                {
                    supHeading: "Growth",
                    heading: "See how your plants grow",
                    description: `Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
          non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.`,
                },
            ],
        };
    },
});
</script>

<template>
    <!-- First Feature Section -->
    <section class="mb-7 md:grid lg:grid-cols-12 lg:justify-center lg:gap-2">
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
            <PlantCardComponent :hide-drop-down="true"></PlantCardComponent>
            <PlantCardComponent
                plantImg="../../../assets/img/ficusDummy.jpg"
                altImg="An image of a ficus plant in a white pot"
                class="absolute top-0 left-2/4 -z-10 scale-90 opacity-40"
                :hide-drop-down="true"
            ></PlantCardComponent>
            <PlantCardComponent
                plantImg="../../../assets/img/fiddleDummy.jpg"
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
            />
            <PlantCardComponent
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
                plantImg="../../../assets/img/snakePlantSmall.jpg"
                title="Snake plant"
                altImg="A young snake plant in a white pot"
                :hideDropDown="true"
            ></PlantCardComponent>
        </div>
        <div class="lg:col-start-11 lg:col-end-13 lg:mr-10 xl:col-start-10">
            <p class="mb-2 text-center text-2xl">Week 6</p>
            <PlantCardComponent
                plantImg="../../../assets/img/snakePlantLarge.jpg"
                title="Snake plant"
                altImg="A big snake plant on the floor in a black pot"
                :hideDropDown="true"
            ></PlantCardComponent>
        </div>
    </section>
</template>
