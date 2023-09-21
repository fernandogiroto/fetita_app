<template>
  {{ links }}
  <div v-if="links.length > 3">
    <ul class="pagination justify-content-center">
      <template v-for="(link, key) in links">
        <li class="page-item" v-if="link.url === null" :key="key">
          <a class="page-link" :href="link.url" v-html="link.label='teste'"></a>
        </li>
        <li class="page-item" :class="{ 'active': link.active }" v-else :key="key + 1">
          <a class="page-link" :href="link.url" v-html="link.label"></a>
        </li>
      </template>
    </ul>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const { links } = defineProps(['links']);

const prevLabel = 'Anterior';
const nextLabel = 'Próximo';
</script>
