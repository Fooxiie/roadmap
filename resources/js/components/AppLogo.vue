<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import type { SharedData } from '@/types';

const page = usePage<SharedData>();
const user = computed(() => page.props.auth.user);
const company = computed(() => user.value?.company);

const getLogoUrl = (path: string | undefined) => {
    if (!path) return '';
    return `/storage/${path}`;
};
</script>

<template>
    <div class="flex aspect-square size-8 items-center justify-center rounded-md bg-sidebar-primary text-sidebar-primary-foreground">
        <img
            v-if="company?.logo"
            :src="getLogoUrl(company.logo)"
            :alt="company.name"
            class="size-full rounded-md object-cover"
        />
        <AppLogoIcon v-else class="size-5 fill-current text-white dark:text-black" />
    </div>
    <div class="ml-1 grid flex-1 text-left text-sm">
        <span class="mb-0.5 truncate font-semibold leading-none">{{ company?.name || 'RoadMap' }}</span>
    </div>
</template>
