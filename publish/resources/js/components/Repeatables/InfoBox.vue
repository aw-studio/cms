<template>
    <section class="container">
        <div class="flex justify-center">
            <UiInfoBox
                class="w-96"
                :title="repeatable.title"
                v-html="repeatable.text"
            />
        </div>
    </section>
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
