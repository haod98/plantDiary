<script setup>
import JetActionSection from "@/Jetstream/ActionSection.vue";
import JetButton from "@/Jetstream/Button.vue";
import { Inertia } from "@inertiajs/inertia";

const logout = () => {
    Inertia.post(route("logout"));
};
</script>

<template>
    <JetActionSection>
        <template #title> Logout </template>
        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Logout from current session
            </div>

            <div class="mt-5">
                <form @submit.prevent>
                    <JetButton @click="logout"> Logout </JetButton>
                </form>
            </div>
        </template>
    </JetActionSection>
</template>
