<template>
    <div class="container">
        <div v-html="repeatable.text"></div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
    props: {
        repeatable: {
            type: Object,
        },
    },
    setup(props) {},
});
</script>
