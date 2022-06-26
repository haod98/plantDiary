<template>
    <Head title="Local Shops" />
    <AppLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Local shops
            </h2>
        </template>
        <div class="my-5 mx-4">
            <JetLabel for="search">Search</JetLabel>
            <input
                type="text"
                ref="input"
                id="search"
                class="rounded-md border-gray-300 shadow-sm focus:ring focus:ring-plantDiary-100 focus:ring-opacity-50"
            />
            <JetButton @click="searchShop" class="mx-3">Search</JetButton>
        </div>
        <div
            ref="mapContainer"
            id="map"
            style="height: 1000px; z-index: 1000"
        ></div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "../../Layouts/AppLayout";
import { onMounted, ref } from "vue";
import JetButton from "../../Jetstream/Button.vue";
import JetLabel from "../../Jetstream/Label.vue";

import { Head } from "@inertiajs/inertia-vue3";

const mapContainer = ref(null);
const input = ref();
const ZOOM_LEVEL = 19;

onMounted(() => {
    initMap();
});

let map, service, infoWindow;
function searchShop() {
    const inputValue = input.value.value;
    service = new google.maps.places.PlacesService(map);
    let request = {
        fields: ["name", "opening_hours", "geometry", "formatted_address"],
        query: `florists, ${inputValue}`,
    };
    service.findPlaceFromQuery(request, (results, status) => {
        console.log(results);
        if (status == "OK" && results) {
            createMarker(results[0]);
        }
        map.setCenter(results[0].geometry.location);
    });
}

function createMarker(place) {
    if (!place.geometry || !place.geometry.location) return;

    const marker = new google.maps.Marker({
        map,
        position: place.geometry.location,
    });

    google.maps.event.addListener(marker, "click", () => {
        infoWindow.setPosition(place.geometry.location);
        infoWindow.setContent(
            `<div style="font-size: 16px;"><strong>Name:</strong> ${place.name}<br><strong>Address:</strong> ${place.formatted_address}</div>`
        );
        infoWindow.open(map);
    });
}

function initMap() {
    let vienna = new google.maps.LatLng(48.2082, 16.3738);
    infoWindow = new google.maps.InfoWindow();
    map = new google.maps.Map(mapContainer.value, {
        center: vienna,
        zoom: ZOOM_LEVEL,
    });
}
</script>
