<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button.vue";

export default {
    components: {
        AppLayout,
        Link,
        Head,
        JetButton,
    },
    props: {
        rooms: {
            type: Object,
        },
    },
    methods: {
        isRoomEmpty(rooms) {
            return Object.keys(rooms).length === 0;
        },
    },
};
</script>
<template>
    <Head title="Rooms" />
    <AppLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                My rooms
            </h2>
        </template>
        <div v-if="$page.props.flash.success" class="bg-plantDiary-150">
            <p
                class="mx-auto max-w-7xl py-6 px-4 font-semibold text-white sm:px-6 lg:px-8"
            >
                {{ $page.props.flash.success }}
            </p>
        </div>
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <Link
                :href="route('rooms.create')"
                class="inline-flex items-center rounded-md border border-transparent bg-plantDiary-100 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-plantDiary-150 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-plantDiary-150 disabled:opacity-25"
            >
                Create a new room
            </Link>
            <div class="mt-4">
                <h2 class="mb-4 text-xl font-semibold">Your rooms</h2>
                <p v-if="isRoomEmpty(rooms)">Your rooms list is empty</p>
                <div v-for="room in rooms" :key="room.id">
                    <div class="mb-4 grid grid-cols-5 gap-2 md:grid-cols-7">
                        <Link
                            :href="route('rooms.show', room.id)"
                            class="col-start-1 col-end-5 inline-flex items-center rounded-md border border-transparent bg-plantDiary-100 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-plantDiary-150 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-plantDiary-150 disabled:opacity-25 md:col-end-7"
                        >
                            {{ room.name }}
                        </Link>
                        <Link
                            :href="route('rooms.edit', room.id)"
                            class="col-start-5 flex inline-flex items-center justify-center rounded-md border border-transparent bg-gray-300 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-gray-500 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-plantDiary-150 disabled:opacity-25 md:col-start-7"
                            >Edit</Link
                        >
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
