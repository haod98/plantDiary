<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetBanner from "@/Jetstream/Banner.vue";
import logo from "../../assets/logo.svg";
import add from "../../assets/svg/add.svg";

defineProps({
    title: String,
});

const navbar = ref();
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
                        <Link :href="route('dashboard')">
                            <img :src="logo" class="h-7" alt="" />
                        </Link>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main style="margin-bottom: 89px">
                <slot />
                <nav ref="navbar" class="navbar-bottom fixed bottom-0 w-full">
                    <ul
                        class="flex justify-around bg-black pt-6 pb-3 text-white"
                    >
                        <li>
                            <Link
                                :href="route('dashboard')"
                                :class="{
                                    'text-plantDiary-100':
                                        $page.url.startsWith('/dashboard'),
                                }"
                                class="flex flex-col items-center"
                            >
                                <svg
                                    class="h-5"
                                    id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 26.41 22.96"
                                >
                                    <defs>
                                        <clipPath id="clippath">
                                            <path
                                                style="fill: none"
                                                d="M0 0h26.41v22.96H0z"
                                            />
                                        </clipPath>
                                    </defs>
                                    <g
                                        style="clip-path: url(#clippath)"
                                        id="Group_51"
                                    >
                                        <g id="Group_50">
                                            <path
                                                id="Path_51"
                                                class="cls-3"
                                                d="M16.3 12.58c-.89 0-1.78-.09-2.65-.31l-.53-.15-.1-.53c-.53-3.36.64-6.76 3.12-9.08a10.78 10.78 0 0 1 9.52-2.2l.53.15.1.53c.53 3.36-.64 6.76-3.12 9.08-1.9 1.66-4.35 2.56-6.87 2.51m-1.61-1.86c2.6.48 5.27-.23 7.29-1.94a8.356 8.356 0 0 0 2.64-6.93c-2.6-.48-5.27.23-7.29 1.94a8.356 8.356 0 0 0-2.64 6.93"
                                                :class="{
                                                    'fill-icon':
                                                        $page.url.startsWith(
                                                            '/dashboard'
                                                        ),
                                                }"
                                            />
                                            <path
                                                id="Path_52"
                                                class="cls-3"
                                                d="M10.07 15.26c-2.39.04-4.73-.78-6.57-2.3A10.3 10.3 0 0 1 .07 3.98l.08-.53.53-.16c3.32-.93 6.88-.22 9.59 1.9 2.55 2.24 3.83 5.61 3.42 8.98l-.08.53-.53.16c-.98.27-2 .41-3.02.4M1.78 4.8c-.16 2.6.9 5.13 2.87 6.84a8.79 8.79 0 0 0 7.35 1.7c.16-2.6-.9-5.13-2.87-6.84a8.79 8.79 0 0 0-7.35-1.7"
                                                :class="{
                                                    'fill-icon':
                                                        $page.url.startsWith(
                                                            '/dashboard'
                                                        ),
                                                }"
                                            />
                                            <path
                                                id="Path_53"
                                                class="cls-3"
                                                d="M13.17 22.96h1.25c.14 0 .26-.11.26-.26V11.76c0-.14-.12-.26-.26-.26h-1.25c-.14 0-.26.11-.26.25V22.7c0 .14.12.26.26.26"
                                                :class="{
                                                    'fill-icon':
                                                        $page.url.startsWith(
                                                            '/dashboard'
                                                        ),
                                                }"
                                            />
                                        </g>
                                    </g>
                                </svg>

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
                                class="flex flex-col items-center"
                            >
                                <svg
                                    id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 25.14 22.08"
                                    class="h-5"
                                >
                                    <defs>
                                        <clipPath id="clippath">
                                            <path
                                                style="fill: none"
                                                d="M0 0h25.14v22.08H0z"
                                            />
                                        </clipPath>
                                    </defs>
                                    <g
                                        style="clip-path: url(#clippath)"
                                        id="Group_53"
                                    >
                                        <g id="Group_52">
                                            <path
                                                :class="{
                                                    'fill-icon':
                                                        $page.url.startsWith(
                                                            '/rooms'
                                                        ),
                                                }"
                                                id="Path_54"
                                                class="cls-3"
                                                d="M19.9 22.08H5.24c-1.42 0-2.57-1.15-2.58-2.58v-8.52H1.25A1.25 1.25 0 0 1 .5 8.73L11.83.25c.44-.33 1.05-.33 1.49 0l11.33 8.49c.55.41.66 1.19.25 1.74-.24.31-.61.5-1 .5h-1.41v8.52c0 1.42-1.16 2.58-2.58 2.58M2.26 9.4h1.98v10.1c0 .55.44.99.99.99h14.66c.55 0 .99-.44.99-.99V9.4h1.98L12.57 1.67 2.26 9.4Z"
                                            />
                                            <path
                                                :class="{
                                                    'fill-icon':
                                                        $page.url.startsWith(
                                                            '/rooms'
                                                        ),
                                                }"
                                                id="Path_55"
                                                class="cls-3"
                                                d="M14.4 22.08h-3.65c-.96 0-1.74-.78-1.74-1.74V15.1c0-.96.78-1.74 1.74-1.74h3.66c.96 0 1.74.78 1.74 1.74v5.24c0 .96-.78 1.74-1.74 1.74m-3.66-7.13c-.09 0-.15.07-.15.15v5.24c0 .09.07.15.15.15h3.66c.09 0 .15-.07.15-.15V15.1c0-.09-.07-.15-.15-.15h-3.66Z"
                                            />
                                        </g>
                                    </g>
                                </svg>

                                My rooms
                            </Link>
                        </li>
                        <li>
                            <Link
                                :href="route('plants.create')"
                                :class="{
                                    'text-plantDiary-100':
                                        $page.url === '/plants/create',
                                }"
                            >
                                <img :src="add" alt="" class="h-10" />
                            </Link>
                        </li>
                        <li>
                            <Link
                                :href="route('shops.index')"
                                :class="{
                                    'text-plantDiary-100':
                                        $page.url.startsWith('/local-shop'),
                                }"
                                class="flex flex-col items-center"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 23.16 18.01"
                                    class="h-5"
                                >
                                    <path
                                        :class="{
                                            'fill-icon':
                                                $page.url.startsWith(
                                                    '/local-shop'
                                                ),
                                        }"
                                        d="M22.74.17c.26.18.42.48.42.79v13.51c-.01.4-.26.75-.62.9l-6.76 2.57c-.21.08-.44.09-.65.02l-7.4-2.46-6.43 2.45a.96.96 0 0 1-1.24-.55 1.03 1.03 0 0 1-.06-.35V3.54c0-.4.25-.76.62-.9L7.38.06c.21-.08.44-.08.65-.01l7.39 2.46L21.86.06c.3-.11.63-.07.89.11ZM1.93 15.65l4.82-1.84V2.36L1.93 4.2v11.45ZM14.48 4.23 8.69 2.3v11.48l5.79 1.93V4.23Zm1.93 11.42 4.82-1.84V2.36L16.41 4.2v11.45Z"
                                        style="fill: #949494"
                                    />
                                </svg>

                                Local shops
                            </Link>
                        </li>
                        <li>
                            <Link
                                :href="route('profile.show')"
                                :class="{
                                    'text-plantDiary-100':
                                        $page.url.startsWith('/user/profile'),
                                }"
                                class="flex flex-col items-center"
                            >
                                <svg
                                    class="h-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 16.19 18.5"
                                >
                                    <path
                                        :class="{
                                            'fill-icon':
                                                $page.url.startsWith(
                                                    '/user/profile'
                                                ),
                                        }"
                                        d="M9.83 10.99H6.36C2.85 10.99 0 13.84 0 17.35c0 .64.52 1.15 1.16 1.15h13.87c.64 0 1.16-.52 1.16-1.16 0-3.51-2.85-6.36-6.36-6.36Zm-8.06 5.78a4.63 4.63 0 0 1 4.59-4.05h3.47c2.33 0 4.3 1.74 4.59 4.05H1.77ZM8.1 9.25c2.55 0 4.62-2.08 4.62-4.63S10.64 0 8.09 0 3.47 2.07 3.47 4.63c0 2.55 2.07 4.63 4.63 4.63Zm0-7.52c1.6 0 2.89 1.3 2.88 2.9 0 1.6-1.3 2.89-2.9 2.88a2.89 2.89 0 1 1 .02-5.78Z"
                                        style="fill: #949494"
                                    />
                                </svg>
                                Profile
                            </Link>
                        </li>
                    </ul>
                </nav>
            </main>
        </div>
    </div>
</template>

<style>
/* For SVG */
.cls-3 {
    fill: #949494;
}

.fill-icon {
    fill: #7ca982 !important;
}
</style>
