<template>
    <Disclosure>
        <DisclosureButton
            class="
                flex
                bg-yellow-100
                my-2
                rounded-sm
                justify-between
                w-full
                px-4
                py-2
                focus:outline-none
                focus:ring
                focus:ring-yellow-500
                focus:ring-opacity-75
            "
        >
            {{ title }}
        </DisclosureButton>
        <DisclosurePanel class="px-4 pt-4 pb-2">
            <slot />
        </DisclosurePanel>
    </Disclosure>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
export default defineComponent({
    components: { Disclosure, DisclosureButton, DisclosurePanel },
    props: {
        title: {
            type: Object,
        },
    },
    setup(props) {
        //
    },
});
</script>
