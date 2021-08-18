<template>
    <div class="container">
        <UiImage :image="repeatable.image[0]" />
    </div>
</template>

<script lang="ts">
import { defineComponent, onMounted, ref } from 'vue';
export default defineComponent({
    props: {
        repeatable: {
            type: Object,
        },
    },
    setup(props) {
        //
    },
});
</script>
