<script>
import { defineComponent } from "vue";
export default defineComponent({
    props: {
        isNavActive: Boolean,
    },
});
</script>
<template>
    <button data-cy="burger-menu">
        <font-awesome
            icon="bars"
            size="2x"
            class="transition duration-500 ease-in-out"
            :color="isNavActive ? 'white' : 'black'"
        />
    </button>
</template>
