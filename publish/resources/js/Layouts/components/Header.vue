<template>
    <header class="py-3 bg-gray-100">
        <div class="container flex items-center justify-between">
            <div>Logo</div>
            <nav class="flex justify-end">
                <div class="flex space-x-4">
                    <Link
                        :href="link.route"
                        v-for="(link, index) in mainNavigation.data"
                        :key="index"
                    >
                        {{ link.title }}
                    </Link>
                </div>
                <div class="ml-8">
                    <Localize />
                </div>
            </nav>
        </div>
    </header>
</template>

<script lang="ts">
import { defineComponent, computed } from 'vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';
import Localize from './Localize.vue';
export default defineComponent({
    components: {
        Link,
        Localize,
    },
    setup() {
        /**
         * Main naviagtion items from
         */
        const mainNavigation = computed(
            () => usePage().props.value.mainNavigation
        );
        return {
            mainNavigation,
        };
    },
});
</script>
