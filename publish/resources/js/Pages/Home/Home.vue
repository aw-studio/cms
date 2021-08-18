<template>
    <AppHead title="Master" />
    <LitBlock :block="form.content" :repeatables="repeatables" />
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue';
import repeatables from '../content.block';
export default defineComponent({
    props: {
        form: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        return {
            repeatables,
        };
    },
});
</script>
