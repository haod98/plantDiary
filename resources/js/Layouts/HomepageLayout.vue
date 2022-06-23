<script setup>
import NavbarComponent from "../Pages/components/NavbarComponent.vue";
import FooterComponent from "../Pages/components/FooterComponent.vue";
</script>
<template>
    <header class="mb-3 px-4 lg:px-10">
        <NavbarComponent />
    </header>

    <main class="px-4 lg:px-10">
        <slot />
    </main>

    <footer>
        <FooterComponent />
    </footer>
</template>
