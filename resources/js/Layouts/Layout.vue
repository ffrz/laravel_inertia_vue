<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div>
    <header class="bg-indigo-500 text-white">
      <nav class="flex items-center justify-between p-4 max-w-screen-lg mx-auto">
        <div class="space-x-6">
          <Link href="/">Home</Link>
          <Link href="/about">About</Link>
        </div>
      </nav>
    </header>
    <main>
      <slot></slot>
    </main>
  </div>
</template>
