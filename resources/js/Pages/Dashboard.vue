<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import Plants from "./Plants/Index.vue";
import CardContent from "./components/dashboardCards/CardContent.vue";
export default {
    components: {
        AppLayout,
        Welcome,
        Plants,
        CardContent,
    },
    props: {
        plants: {
            type: Object,
        },
    },
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                My plants
            </h2>
        </template>
        <div v-if="$page.props.flash.success" class="bg-plantDiary-150">
            <p
                class="mx-auto max-w-7xl py-6 px-4 font-semibold text-white sm:px-6 lg:px-8"
            >
                {{ $page.props.flash.success }}
            </p>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
        </div>
        <Plants :plants="plants" />
    </AppLayout>
</template>
