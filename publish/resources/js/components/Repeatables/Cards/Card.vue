<template>
    <div class="p-6 shadow col-span-12 md:col-span-6 lg:col-span-4">
        <div class="font-bold pb-2">{{ repeatable.title }}</div>
        {{ repeatable.text }}
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
