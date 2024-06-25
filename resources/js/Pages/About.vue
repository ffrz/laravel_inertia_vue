<template>
  <Head title="About" />
  <h1 class="text-3xl font-bold">
    About {{ user }}
  </h1>
</template>

<script setup>
defineProps({
  user: String
})
</script>
