<template>
    <header class="py-3 bg-gray-100">
        <div class="container flex items-center justify-between">
            <div>Logo</div>
            <nav>
                <Link
                    :href="link.route"
                    v-for="(link, index) in mainNavigation.data"
                    :key="index"
                >
                    <pre>{{ link.title }}</pre>
                </Link>
                <div class="absolute top-0 right-0">
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
