<template>
    <img
        ref="imageRef"
        class="w-full lazyload lazyload-animation"
        loading="lazy"
        alt="XXXXXXXXXXXXXXX"
        :data-srcset="getSrcset(image)"
        data-sizes="auto"
    />
</template>

<script lang="ts">
import { defineComponent, onMounted, ref } from 'vue';
import 'lazysizes';

export default defineComponent({
    props: {
        image: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const imageRef = ref<HTMLElement>();

        const setSizesAttr = () => {
            const width = imageRef.value?.getBoundingClientRect().width;
            imageRef.value?.setAttribute('sizes', `${width}px`);
        };

        onMounted(() => {
            setSizesAttr();
            window.addEventListener('resize', () => {
                setSizesAttr();
            });
        });

        /**
         * TODO: from settings
         */
        const conversions: { [key: string]: number } = {
            sm: 300,
            md: 500,
            lg: 900,
            xl: 1400,
        };

        const getSrcset = (image: any) => {
            let srcset = '';

            Object.keys(image.generated_conversions).forEach(
                (conversion: string) => {
                    if (
                        image.conversion_urls.hasOwnProperty(conversion) &&
                        conversions.hasOwnProperty(conversion)
                    ) {
                        srcset +=
                            `${image.conversion_urls[conversion]} ${conversions[conversion]}w,` +
                            '\n';
                    }
                }
            );
            return srcset;
        };

        return {
            imageRef,
            getSrcset,
        };
    },
});
</script>
