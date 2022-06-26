<script setup>
import logo from "../../../assets/logo.svg";
import { Link } from "@inertiajs/inertia-vue3";
</script>
<template>
    <div class="hidden lg:block">
        <ul
            class="flex justify-between bg-plantDiary-100 py-4 font-light text-white"
        >
            <li class="ml-7"><a href="#">Home</a></li>
            <li>
                <Link :href="route('register')">Create account</Link>
            </li>
            <li>
                <Link :href="route('tos')"> Terms of Service </Link>
            </li>
            <li>
                <Link :href="route('privacy')"> Privacy Policy </Link>
            </li>
            <li class="mr-7">
                <Link href="/">
                    <img :src="logo" alt="Plant Diary Logo" class="w-52" />
                </Link>
            </li>
        </ul>
    </div>
</template>
