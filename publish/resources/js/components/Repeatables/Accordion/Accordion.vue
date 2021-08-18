<template>
    <!-- https://headlessui.dev/vue/disclosure -->
    <div class="container py-6">
        <UiAccordion
            v-for="(item, index) in repeatable.items"
            :key="index"
            :title="item.title"
        >
            {{ item.text }}
        </UiAccordion>
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
    setup(props) {
        //
    },
});
</script>
