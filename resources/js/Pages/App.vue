<script setup>
import NavbarComponent from "./components/NavbarComponent.vue";
import HeroSection from "./components/HeroSection.vue";
import FeatureComponent from "./components/FeatureComponent.vue";
import PlantCardComponent from "./components/PlantCardComponent.vue";
import PrimaryButton from "./components/buttons/PrimaryButton.vue";
import FooterComponent from "./components/FooterComponent.vue";
import HomeView from "./HomeView.vue";
import { defineComponent } from "vue";
defineComponent({
    components: {
        NavbarComponent,
    },
});
</script>

<template>
    <header class="mb-3 px-4 lg:px-10">
        <NavbarComponent />
    </header>

    <main class="px-4 lg:px-10">
        <HomeView />
    </main>
    <footer>
        <FooterComponent />
    </footer>
</template>
