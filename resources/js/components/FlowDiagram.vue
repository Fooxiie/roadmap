<template>
  <div class="w-full h-full">
    <VueFlow v-model="elements" :default-viewport="{ x: 0, y: 0, zoom: 1.5 }">
    </VueFlow>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { VueFlow } from '@vue-flow/core'
import '@vue-flow/core/dist/style.css'
import '@vue-flow/core/dist/theme-default.css'
import '@vue-flow/controls/dist/style.css'

const elements = ref([
  {
    id: '1',
    type: 'input',
    label: 'Node 1',
    position: { x: 250, y: 5 },
  },
  {
    id: '2',
    label: 'Node 2',
    position: { x: 100, y: 100 },
  },
  {
    id: '3',
    label: 'Node 3',
    position: { x: 400, y: 100 },
  },
  {
    id: '4',
    type: 'output',
    label: 'Node 4',
    position: { x: 250, y: 200 },
  },
  { id: 'e1-2', source: '1', target: '2' },
  { id: 'e1-3', source: '1', target: '3' },
  { id: 'e2-4', source: '2', target: '4' },
  { id: 'e3-4', source: '3', target: '4' },
])
</script> 