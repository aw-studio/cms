<template>
    <AppHead />
    <Header />
    <main>
        <slot />
    </main>
    <Footer />
</template>

<script lang="ts">
import { defineComponent } from 'vue';

import Header from './components/Header.vue';
import Footer from './components/Footer.vue';

export default defineComponent({
    components: {
        Header,
        Footer,
    },
    props: {},
    setup() {
        //
    },
});
</script>
