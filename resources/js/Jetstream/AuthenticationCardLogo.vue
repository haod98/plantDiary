<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Logo from "../../assets/logo.svg";
</script>

<template>
    <Link :href="'/'">
        <img :src="Logo" alt="Home" class="h-16" />
    </Link>
</template>
