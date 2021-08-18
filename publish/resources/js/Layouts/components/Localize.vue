<template>
    <!-- https://headlessui.dev/vue/menu -->
    <div class="text-right">
        <Menu as="div" class="relative inline-block text-left">
            <MenuButton>
                {{ locale }}
            </MenuButton>
            <MenuItems
                class="absolute right-0 mt-2 origin-top-right bg-white shadow"
            >
                <MenuItem
                    v-slot="{ active }"
                    v-for="(link, locale) in localize"
                    :key="locale"
                >
                    <a :href="link" class="block px-3">
                        {{ locale }}
                    </a>
                </MenuItem>
            </MenuItems>
        </Menu>
    </div>
</template>

<script lang="ts">
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue';
import { defineComponent, computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
    },
    setup() {
        const locale = computed(() => usePage().props.value.locale);
        const localize = computed(() => usePage().props.value.localize);
        return {
            locale,
            localize,
        };
    },
});
</script>
