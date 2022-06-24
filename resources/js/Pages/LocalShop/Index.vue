<template>
    <Head title="Local Shops" />
    <AppLayout>
        <template #header>
            <h2>Local shops</h2>
        </template>
        <div ref="map"></div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "../../Layouts/AppLayout";
import { onMounted, ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

const map = ref(null);
onMounted(() => {
    function initMap() {
        map = new google.maps.Map(map, {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 8,
        });
    }
    initMap();
});
</script>
