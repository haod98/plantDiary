<script>
import { defineComponent } from "vue";
import PrimaryHeading from "../components/headings/PrimaryHeading.vue";
import StrongText from "./headings/StrongText.vue";
import UnderlineButton from "./buttons/UnderlineButton.vue";
import PrimaryButton from "./buttons/PrimaryButton.vue";
import plantHeroImg from "../../../assets/img/plantHero.png";
import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
    components: {
        PrimaryHeading,
        StrongText,
        UnderlineButton,
        PrimaryButton,
        Link,
    },
    data() {
        return {
            plantHeroImg,
        };
    },
});
</script>

<template>
    <div class="my-12 flex flex-col lg:mt-32 lg:grid lg:grid-cols-12">
        <PrimaryHeading
            title="Plant Diary - We take care of your plants"
            class="sr-only"
        />
        <div
            class="mb-8 lg:col-start-1 lg:col-end-4 lg:flex lg:flex-col lg:justify-center"
        >
            <StrongText title="We take care of your plants" />
            <a
                href="#simple"
                class="block py-2 text-center text-xl uppercase text-black underline decoration-plantDiary-100 decoration-4"
            >
                Learn how
            </a>
        </div>
        <div
            class="justify-center lg:col-start-4 lg:col-end-10 lg:flex lg:self-center"
        >
            <img
                :src="plantHeroImg"
                alt="A plant in a white pot, with many leaves hanging down"
            />
        </div>
        <div
            class="lg:col-start-10 lg:col-end-13 lg:flex lg:flex-col lg:items-center lg:justify-center lg:gap-2"
        >
            <StrongText
                title="Already Interested? Create an Account for free"
            />
            <Link :href="route('register')">
                <PrimaryButton class="hidden lg:block" buttonText="Sign Up" />
            </Link>
        </div>
        <div class="mx-auto text-center lg:hidden">
            <Link :href="route('register')">
                <PrimaryButton buttonText="Sign up" class="inline-block" />
            </Link>
        </div>
    </div>
</template>
