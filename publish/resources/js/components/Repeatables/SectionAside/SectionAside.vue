<template>
    <!-- https://headlessui.dev/vue/disclosure -->
    <div class="container py-6">
        <section class="grid grid-cols-12 gap-6 mb-12">
            <div class="order-2 md:order-1 col-span-full md:col-span-8">
                <LitBlock
                    :block="repeatable.content"
                    :repeatables="repeatables"
                />
            </div>
            <div class="order-1 md:order-2 col-span-full md:col-span-4">
                <LitBlock
                    :block="repeatable.aside"
                    :repeatables="repeatables"
                />
            </div>
        </section>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import repeatables from './section-aside.block';
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
