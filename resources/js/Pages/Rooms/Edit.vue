<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";
import JetButton from "../../Jetstream/Button.vue";
import JetInput from "../../Jetstream/Input.vue";
import JetLabel from "../../Jetstream/Label.vue";
import { ref } from "vue";
import JetDialogModal from "@/Jetstream/DialogModal.vue";

export default {
    components: {
        AppLayout,
        Link,
        Head,
        JetButton,
        JetInput,
        JetLabel,
        JetDialogModal,
        ref,
    },
    setup(props) {
        const form = useForm({
            name: props.room.name,
        });
        function updateRoom() {
            Inertia.put(route("rooms.update", props.room.id), form);
        }
        function deleteRoom() {
            Inertia.delete(route("rooms.update", props.room.id), form);
        }

        const confirmDeletion = () => {
            confirmingDeletion.value = true;
        };

        const closeModal = () => {
            confirmingDeletion.value = false;
        };

        const confirmingDeletion = ref(false);
        return {
            form,
            updateRoom,
            deleteRoom,
            confirmDeletion,
            closeModal,
            confirmingDeletion,
        };
    },
    props: {
        room: {
            type: Object,
        },
        errors: Object,
    },
};
</script>
<template>
    <Head title="Create room" />
    <AppLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create room
            </h2>
        </template>
        <form
            @submit.prevent
            class="flex flex-col items-center justify-center gap-4 p-4"
        >
            <div class="w-[90vw] max-w-[650px]">
                <div class="flex flex-col">
                    <JetLabel for="name" value="Room name:" />
                    <JetInput v-model="form.name" type="text" id="name" />
                    <p class="text-red-700" v-if="errors.name">
                        {{ errors.name }}
                    </p>
                </div>
                <JetDialogModal :show="confirmingDeletion" @close="closeModal">
                    <template #title> Delete {{ room.name }} </template>
                    <template #content>
                        Are you sure you want to delete your room:
                        <strong>{{ room.name }} </strong>?
                    </template>
                    <template #footer>
                        <JetButton @click="closeModal"> Cancel </JetButton>
                        <JetButton
                            class="ml-3"
                            :class="{ 'opacity-25': form.processing }"
                            button-style-type="danger-border"
                            :disabled="form.processing"
                            @click="deleteRoom"
                        >
                            Delete room
                        </JetButton>
                    </template>
                </JetDialogModal>
                <div class="mt-3 flex justify-center gap-3">
                    <JetButton
                        button-style-type="danger-border"
                        @click="confirmDeletion"
                        >Delete</JetButton
                    >
                    <JetButton @click="updateRoom">Update</JetButton>
                </div>
            </div>
        </form>
    </AppLayout>
</template>
