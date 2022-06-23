<script>
import HomepageLayout from "../Layouts/HomepageLayout.vue";
import HomeView from "./HomeView.vue";
import { defineComponent } from "vue";
export default defineComponent({
    components: {
        HomeView,
        HomepageLayout,
    },
});
</script>

<template>
    <HomepageLayout>
        <HomeView />
    </HomepageLayout>
</template>
