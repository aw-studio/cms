import { computed } from 'vue';

export function getSize(props: any, { DEFAULT = 'md', only = ['sm', 'md', 'lg'] }) {
    return computed(() => {
        if (props.size) {
            return props.size;
        }

        if (props.sm && only.includes('sm')) {
            return 'sm';
        }
        if (props.md && only.includes('md')) {
            return 'md';
        }
        if (props.lg && only.includes('lg')) {
            return 'lg';
        }

        return DEFAULT;
    });
}

export function getVariant(props: any, { DEFAULT = 'blue' }) {
    return computed(() => {
        if (props.variant) {
            return props.variant;
        }

        if (props.blue) {
            return 'blue';
        }
        if (props.gray) {
            return 'gray';
        }
        if (props.green) {
            return 'green';
        }
        if (props.yellow) {
            return 'yellow';
        }
        if (props.red) {
            return 'red';
        }

        return DEFAULT;
    });
}

export const variants = {
    variant: {
        type: String,
        default: null,
    },
    blue: {
        type: Boolean,
        default: false,
    },
    gray: {
        type: Boolean,
        default: false,
    },
    green: {
        type: Boolean,
        default: false,
    },
    yellow: {
        type: Boolean,
        default: false,
    },
    red: {
        type: Boolean,
        default: false,
    },
};


export const sizes = {
    size: {
        type: String,
        default: null,
    },
    sm: {
        type: Boolean,
        default: false,
    },
    md: {
        type: Boolean,
        default: false,
    },
    lg: {
        type: Boolean,
        default: false,
    },
};
