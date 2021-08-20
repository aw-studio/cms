<template>
    <div class="bg-blue-600 p-8 text-white rounded-md mb-8">
        <h2 v-if="title">
            {{ title }}
        </h2>
        <slot />
    </div>
</template>

<script>
import { defineComponent } from '@vue/runtime-core';

export default defineComponent({
    props: {
        title: {
            type: Text,
            default: null,
        },
    },
});
</script>
