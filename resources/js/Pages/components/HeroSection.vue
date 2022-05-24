<script setup>
import { defineComponent } from "vue";
import PrimaryHeading from "../components/headings/PrimaryHeading.vue";
import StrongText from "./headings/StrongText.vue";
import UnderlineButton from "./buttons/UnderlineButton.vue";
import PrimaryButton from "./buttons/PrimaryButton.vue";
import plantHeroImg from "../../../assets/img/plantHero.png";
defineComponent({
    components: {
        PrimaryHeading,
        StrongText,
        UnderlineButton,
        PrimaryButton,
    },
});
</script>

<template>
    <div class="my-12 flex flex-col lg:mt-32 lg:grid lg:grid-cols-12">
        <PrimaryHeading
            title="Plant Diary - We take care of your plants"
            class="sr-only"
        />
        <div
            class="mb-8 lg:col-start-1 lg:col-end-4 lg:flex lg:flex-col lg:justify-center"
        >
            <StrongText title="We take care of your plants" />
            <UnderlineButton buttonText="Learn how" />
        </div>
        <div
            class="justify-center lg:col-start-4 lg:col-end-10 lg:flex lg:self-center"
        >
            <img
                src="../../../assets/img/plantHero.png"
                alt="A plant in a white pot, with many leaves hanging down"
            />
        </div>
        <div
            class="lg:col-start-10 lg:col-end-13 lg:flex lg:flex-col lg:items-center lg:justify-center lg:gap-2"
        >
            <StrongText
                title="Already Interested? Create an Account for free"
            />
            <PrimaryButton class="hidden lg:block" buttonText="Sign Up" />
        </div>
        <div class="mx-auto text-center lg:hidden">
            <router-link :to="{ name: 'signUp' }">
                <PrimaryButton buttonText="Sign up" class="inline-block" />
            </router-link>
        </div>
    </div>
</template>
