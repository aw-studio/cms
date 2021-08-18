<template>
    <div class="container grid grid-cols-12 gap-6 py-12">
        <LitBlock :block="repeatable.cards" :repeatables="repeatables" />
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import repeatables from './cards.block';
export default defineComponent({
    props: {
        repeatable: {
            type: Object,
        },
    },
    setup(props) {
        return {
            repeatables,
        };
    },
});
</script>
