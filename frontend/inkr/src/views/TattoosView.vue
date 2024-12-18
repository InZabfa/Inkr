<template>
  <div>
    <h1>Tattoos</h1>
    <ul>
      <li v-for="tattoo in tattoos" :key="tattoo.id">{{ tattoo.name }}</li>
    </ul>
  </div>
</template>

<script lang="ts">
import { ref, onMounted } from 'vue';
import { getTattoos } from '@/services/api';

export default {
  name: 'TattoosView',
  setup() {
    const tattoos = ref<{ id: string; name: string }[]>([]);

    const fetchTattoos = async () => {
      try {
        tattoos.value = await getTattoos();
      } catch (error) {
        console.error('Failed to load tattoos:', error);
      }
    };

    onMounted(fetchTattoos);

    return {
      tattoos,
    };
  },
};
</script>
