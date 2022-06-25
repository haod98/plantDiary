<template>
    <Head title="Local Shops" />
    <AppLayout>
        <template #header>
            <h2>Local shops</h2>
        </template>
        <div ref="map" id="map" style="height: 1000px"></div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "../../Layouts/AppLayout";
import { onMounted, ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

const map = ref(null);
onMounted(() => {
    initMap();
});
function initMap() {
    console.log(map.value);
    let vienna = new google.maps.LatLng(48.2082, 16.3738);
    new google.maps.InfoWindow();
    new google.maps.Map(map.value, { center: vienna, zoom: 15 });
}
</script>
