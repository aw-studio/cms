<template>
    <component
        :is="tag"
        class="inline-flex items-center justify-center focus:outline-none"
        :class="{
            'focus:ring': !text && !disabled,
            'text-lg': size_ == 'lg',
            'text-base': size_ == 'md',
            'text-xs': size_ == 'sm',
            'w-12': square && size_ == 'lg',
            'w-10': square && size_ == 'md',
            'w-7': square && size_ == 'sm',
            'h-12  rounded-lg': size_ == 'lg' && !text,
            'h-10  rounded-md': size_ == 'md' && !text,
            'h-7  rounded-sm': size_ == 'sm' && !text,
            'px-6': size_ == 'lg' && !square && !text,
            'px-5': size_ == 'md' && !square && !text,
            'px-4': size_ == 'sm' && !square && !text,
            'bg-gray-300 text-gray-600 cursor-default':
                disabled && !outline && !text,
            'bg-blue hover:bg-blue-700 active:bg-blue-800 text-white focus:ring-blue-400 shadow':
                variant_ == 'blue' && !outline && !text && !disabled,
            'bg-white hover:bg-blue-100 active:bg-blue-300 text-blue hover:text-blue-600 active:text-blue-700 border border-blue focus:ring-blue-400':
                variant_ == 'blue' && outline && !text && !disabled,
            'text-blue hover:text-blue-700 active:text-blue-900 border-b border-blue':
                variant_ == 'blue' && text && !disabled,
            'bg-gray-700 hover:bg-gray-800 active:bg-gray-900 focus:ring-gray-400 text-white':
                variant_ == 'gray' && !outline && !text && !disabled,
            'bg-white hover:bg-gray-300 active:bg-gray-500 border border-gray-700 text-gray-700 focus:ring-gray-400':
                variant_ == 'gray' && outline && !text && !disabled,
            'text-gray hover:text-gray-700 active:text-gray-900 border-b border-gray':
                variant_ == 'gray' && text && !disabled,
            'bg-green hover:bg-green-700 active:bg-green-800 focus:ring-green-400 text-white':
                variant_ == 'green' && !outline && !text && !disabled,
            'bg-white hover:bg-green-100 active:bg-green-300 text-green hover:text-green-600 active:text-green-700 border border-green focus:ring-green-400':
                variant_ == 'green' && outline && !text && !disabled,
            'text-green hover:text-green-700 active:text-green-900 border-b border-green':
                variant_ == 'green' && text && !disabled,
            'bg-red hover:bg-red-500 active:bg-red-600 focus:ring-red-400 text-white':
                variant_ == 'red' && !outline && !text && !disabled,
            'bg-white hover:bg-red-100 active:bg-red-300 text-red hover:text-red-600 active:text-red-700 border border-red focus:ring-red-400':
                variant_ == 'red' && outline && !text && !disabled,
            'text-red hover:text-red-700 active:text-red-900 border-b border-red':
                variant_ == 'red' && text && !disabled,
            'bg-yellow hover:bg-yellow-700 active:bg-yellow-800 focus:ring-yellow-400 text-white':
                variant_ == 'yellow' && !outline && !text && !disabled,
            'bg-white hover:bg-yellow-100 active:bg-yellow-300 text-yellow hover:text-yellow-600 active:text-yellow-700 border border-yellow focus:ring-yellow-400':
                variant_ == 'yellow' && outline && !text && !disabled,
            'text-yellow hover:text-yellow-700 active:text-yellow-900 border-b border-yellow':
                variant_ == 'yellow' && text && !disabled,
        }"
    >
        <slot />
    </component>
</template>

<script>
import { defineComponent } from 'vue';
import { getSize, getVariant, variants, sizes } from '../../app.config';
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    props: {
        disabled: {
            default: false,
            type: Boolean,
        },
        text: {
            default: false,
            type: Boolean,
        },
        square: {
            default: false,
            type: Boolean,
        },
        outline: {
            default: false,
            type: Boolean,
        },
        ...variants,
        ...sizes,
    },
    setup(props, { attrs }) {
        const tag = 'href' in attrs ? Link : 'button';
        const variant_ = getVariant(props, {});
        const size_ = getSize(props, {});
        return { tag, variant_, size_ };
    },
});
</script>
