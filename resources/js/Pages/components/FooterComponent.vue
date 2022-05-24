<script setup>
import logo from "../../../assets/logo.svg";
</script>
<template>
    <div class="hidden lg:block">
        <ul
            class="bg-plantDiary-100 flex justify-between py-4 font-light text-white"
        >
            <li class="ml-7"><a href="#">Home</a></li>
            <li><a href="#">Create Account</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Contact Us</a></li>
            <li class="mr-7">
                <a href="#"
                    ><img :src="logo" alt="Plant Diary Logo" class="w-52"
                /></a>
            </li>
        </ul>
    </div>
</template>
