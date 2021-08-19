<template>
    <TransitionRoot appear :show="open" as="template">
        <Dialog as="div" @close="close">
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="min-h-screen px-4 text-center">
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0"
                        enter-to="opacity-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100"
                        leave-to="opacity-0"
                    >
                        <DialogOverlay
                            class="
                                fixed
                                inset-0
                                filter
                                bg-black bg-opacity-30
                                backdrop-filter backdrop-blur-sm
                            "
                        />
                    </TransitionChild>

                    <span
                        class="inline-block h-screen align-middle"
                        aria-hidden="true"
                    >
                        &#8203;
                    </span>

                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <div
                            class="
                                inline-block
                                w-full
                                md:max-w-xl
                                lg:max-w-3xl
                                p-6
                                my-8
                                relative
                                overflow-hidden
                                text-left
                                align-middle
                                transition-all
                                transform
                                bg-white
                                shadow-xl
                                rounded-sm
                            "
                        >
                            <DialogTitle
                                as="h3"
                                class="
                                    text-xl
                                    font-semibold
                                    leading-8
                                    text-gray-900
                                "
                            >
                                <slot name="title" />
                            </DialogTitle>

                            <slot />

                            <div class="absolute top-5 right-6">
                                <button @click="close(false)">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="-6 -6 24 24"
                                        width="24"
                                        height="24"
                                        preserveAspectRatio="xMinYMin"
                                        class="icon__icon fill-current"
                                    >
                                        <path
                                            d="M7.314 5.9l3.535-3.536A1 1 0 1 0 9.435.95L5.899 4.485 2.364.95A1 1 0 1 0 .95 2.364l3.535 3.535L.95 9.435a1 1 0 1 0 1.414 1.414l3.535-3.535 3.536 3.535a1 1 0 1 0 1.414-1.414L7.314 5.899z"
                                        ></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script lang="ts">
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogOverlay,
    DialogTitle,
} from '@headlessui/vue';

export default {
    emits: {
        close(payload: boolean) {
            return payload;
        },
    },
    components: {
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
    },
    props: {
        title: {
            type: String,
            required: true,
        },
        button: {
            type: String,
            default: 'Öffne Modal',
        },
        open: {
            type: Boolean,
            default: false,
        },
    },

    setup({}, { emit }: { emit: any }) {
        function close(val: Boolean) {
            emit('close', val);
            emit('update:open', val);
        }

        return {
            close,
        };
    },
};
</script>
