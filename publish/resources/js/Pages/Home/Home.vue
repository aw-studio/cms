<template>
    <AppHead title="Home" />
    <h1 class="text-xl text-blue-900">{{ message }}</h1>
    <UiButton>Hello World!</UiButton>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue';
export default defineComponent({
    props: {
        message: {
            type: String as PropType<string>,
            required: true,
        },
    },
    setup(props) {
        console.log(props.message);
    },
});
</script>
