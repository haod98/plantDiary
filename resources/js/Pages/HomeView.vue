<script>
import { defineComponent } from "vue";
import HeroSection from "./components/HeroSection.vue";
import FeatureComponent from "./components/FeatureComponent.vue";
import PrimaryButton from "./components/buttons/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        HeroSection,
        FeatureComponent,
        PrimaryButton,
        Link,
    },
};
</script>
<template>
    <HeroSection />
    <FeatureComponent />
    <div class="mb-4 flex flex-col items-center justify-center text-center">
        <p class="text-xl">... and many more features. The best part?</p>
        <strong class="mb-5 text-2xl text-plantDiary-100"
            >It's completely free!</strong
        >
        <Link :href="route('register')">
            <PrimaryButton button-text="Sign up" />
        </Link>
    </div>
</template>
