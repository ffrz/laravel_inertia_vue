<script setup>
const model = defineModel({
  type: null
})
defineProps({
  label: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: 'text',
  },
  message: String
})
</script>
<template>
  <div class="mb-6">
    <label :for="label">{{ label }}</label>
    <input :id="label" :type="type" v-model="model" :class="{ '!ring-red-500': message }" />
    <span class="error" v-if="message">{{ message }}</span>
  </div>
</template>
