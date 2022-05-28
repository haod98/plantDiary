<script setup>
import { defineComponent } from "vue";
import PrimaryButton from "./buttons/PrimaryButton.vue";
import SecondaryButton from "./buttons/SecondaryButton.vue";
import BurgerMenu from "./buttons/BurgerMenu.vue";
import logo from "../../../assets/logo.svg";
import { Link } from "@inertiajs/inertia-vue3";
defineComponent({
    components: {
        PrimaryButton,
        SecondaryButton,
        BurgerMenu,
    },
    data() {
        return {
            navItems: [
                { id: 0, item: "About us" },
                { id: 1, item: "Features" },
                { id: 2, item: "Contact" },
            ],
            isNavActive: false,
        };
    },
    methods: {
        toggleNav() {
            this.isNavActive = !this.isNavActive;
        },
    },
});
</script>

<template>
    <!--  Mobile -->
    <nav class="relative lg:hidden">
        <div class="flex items-center">
            <div class="absolute z-20">
                <BurgerMenu @click="toggleNav" :isNavActive="isNavActive" />
            </div>
            <div class="mx-auto flex min-w-[80%] justify-center">
                <router-link class="min-w-[80%]" :to="{ name: 'home' }">
                    <img
                        class="max-w-[600px]"
                        :src="logo"
                        alt="Plant diary logo"
                    />
                </router-link>
            </div>
        </div>
        <div
            class="fixed top-0 left-0 z-10 h-[100%] -translate-x-56 bg-zinc-900 pl-6 pr-16 pt-16 transition duration-500 ease-in-out"
            :class="[isNavActive ? ['translate-x-0'] : '']"
        >
            <ul>
                <li>
                    <router-link
                        class="text-lg font-light text-white hover:font-normal hover:underline hover:decoration-plantDiary-100"
                        :to="{ name: 'home' }"
                        >Home</router-link
                    >
                </li>
                <li v-for="navItem in navItems" :key="navItem.id">
                    <a
                        href="#"
                        class="text-lg font-light text-white hover:font-normal hover:underline hover:decoration-plantDiary-100"
                        >{{ navItem.item }}</a
                    >
                </li>
            </ul>
            <div class="flex flex-col items-start justify-start gap-3">
                <router-link
                    :to="{ name: 'signUp' }"
                    class="font-bold text-plantDiary-50"
                >
                    Sign Up
                </router-link>
            </div>
        </div>
    </nav>
    <!-- Desktop -->
    <nav class="hidden lg:mt-4 lg:block">
        <ul class="flex justify-between">
            <li>
                <router-link :to="{ name: 'home' }">
                    <img class="w-56" :src="logo" alt="Plant diary logo" />
                </router-link>
            </li>
            <li v-for="navItem in navItems" :key="navItem.id">
                <a
                    href="#"
                    class="text-lg font-light hover:font-normal hover:underline hover:decoration-plantDiary-100"
                    >{{ navItem.item }}</a
                >
            </li>
            <li class="flex gap-2">
                <Link :href="route('register')">
                    <PrimaryButton buttonText="Sign up" />
                </Link>
                <div>
                    <Link :href="route('login')">
                        <SecondaryButton buttonText="Login" />
                    </Link>
                </div>
            </li>
        </ul>
    </nav>
</template>
