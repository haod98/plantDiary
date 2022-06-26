<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetBanner from "@/Jetstream/Banner.vue";
import logo from "../../assets/logo.svg";

defineProps({
    title: String,
});

// const showingNavigationDropdown = ref(false);

const navbar = ref();

// onMounted(() => {
//     height = getNavBarHeight;
// });

// let height;
// const getNavBarHeight = () => {
//     const nav = navbar.value;
//     console.log(nav.clientHeight);
//     return nav.clientHeight;
// };

const logout = () => {
    Inertia.post(route("logout"));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <JetBanner />

        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="mx-auto flex max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                    <div class="ml-auto">
                        <img :src="logo" class="h-7" alt="" />
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main style="margin-bottom: 72px">
                <slot />
                <nav ref="navbar" class="navbar-bottom fixed bottom-0 w-full">
                    <ul class="flex justify-around bg-black py-6 text-white">
                        <li>
                            <Link
                                :href="route('dashboard')"
                                :class="{
                                    'text-plantDiary-100':
                                        $page.url.startsWith('/dashboard'),
                                }"
                            >
                                My plants
                            </Link>
                        </li>
                        <li>
                            <Link
                                :href="route('rooms.index')"
                                :class="{
                                    'text-plantDiary-100':
                                        $page.url.startsWith('/rooms'),
                                }"
                                >My rooms
                            </Link>
                        </li>
                        <li>
                            <Link
                                :href="route('plants.create')"
                                :class="{
                                    'text-plantDiary-100':
                                        $page.url === '/plants/create',
                                }"
                                >Add
                            </Link>
                        </li>
                        <li>
                            <Link
                                :href="route('shops.index')"
                                :class="{
                                    'text-plantDiary-100':
                                        $page.url.startsWith('/local-shop'),
                                }"
                                >Local shops
                            </Link>
                        </li>
                        <li>
                            <Link
                                :href="route('profile.show')"
                                :class="{
                                    'text-plantDiary-100':
                                        $page.url.startsWith('/user/profile'),
                                }"
                                >Profile
                            </Link>
                        </li>
                    </ul>
                </nav>
            </main>
        </div>
    </div>
</template>
