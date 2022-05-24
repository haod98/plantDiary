<script setup>
import { defineComponent } from "vue";
import HeroSection from "./components/HeroSection.vue";
import FeatureComponent from "./components/FeatureComponent.vue";
import PrimaryButton from "./components/buttons/PrimaryButton.vue";

defineComponent({
    components: {
        HeroSection,
        FeatureComponent,
        PrimaryButton,
    },
});
</script>
<template>
    <HeroSection />
    <FeatureComponent />
    <div class="mb-4 flex flex-col items-center justify-center text-center">
        <p class="text-xl">... and many more features. The best part?</p>
        <strong class="text-plantDiary-100 mb-5 text-2xl"
            >It's completely free!</strong
        >
        <router-link :to="{ name: 'signUp' }">
            <PrimaryButton button-text="Sign up" />
        </router-link>
    </div>
</template>
