<script setup>
import NavbarComponent from "./components/NavbarComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";
import HomeView from "./HomeView.vue";
import { defineComponent } from "vue";
defineComponent({
    components: {
        NavbarComponent,
        HomeView,
        FooterComponent,
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
