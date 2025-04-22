<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" :class="className" v-bind="$attrs">
        <circle cx="100" cy="100" r="90" stroke="#4F46E5" stroke-width="10" />
        <path d="M60 100 L100 60 L140 100 L100 140 Z" fill="#4F46E5"/>
    </svg>
</template>
