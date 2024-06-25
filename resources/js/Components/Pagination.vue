<script setup>
defineProps({
  paginator: {
    type: Object,
    required: true,
  }
})

const makeLabel = (label) => {
  if (label.includes('Previous')) {
    return "<<";
  }
  else if (label.includes('Next')) {
    return ">>";
  }

  return label;
}
</script>
<template>
  <div class="flex justify-between items-start">
    <div class="flex items-center rounded-md overflow-hidden shadow-lg">
      <div v-for="link in paginator.links" :key="link.url">
        <component :is="link.url ? 'Link' : 'span'" v-html="makeLabel(link.label)" :href="link.url"
          class="w-12 h-12 grid place-items-center border-x bg-white border-slate-50"
          :class="{
            'hover:bg-slate-300': link.url,
            'text-zinc-400': !link.url,
            'font-bold text-blue-500 !bg-slate-300': link.active,
           }" />
      </div>
    </div>
    <p class="text-slate-500 text-sm">Showing {{ paginator.from }} to {{ paginator.to }} of {{ paginator.total }} results. </p>
  </div>
</template>
