<script setup>
import { ref, watch } from 'vue';
import Pagination from '../Components/Pagination.vue';
import { router } from '@inertiajs/vue3';
import { debounce } from 'lodash';

const props = defineProps({
  users: Object,
  search: String,
  acl: Object,
})

const search = ref(props.search)
watch(search, debounce((q) =>
  router.get('/dashboard', { search: q }, { preserveState: true }), 500))
const formatDate = (date) =>
  new Date(date).toLocaleDateString("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
  })

</script>

<template>

  <Head title="Dashboard" />
  <div class="flex justify-end mb-4">
    <div class="w-1/4">
      <input type="search" placeholder="Search" v-model="search">
    </div>
  </div>
  <table>
    <thead class="bg-slate-300">
      <tr>
        <th>Avatar</th>
        <th>Name</th>
        <th>Email</th>
        <th>Registration Date</th>
        <th v-if="acl.can_delete_user">Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="user in users.data" :key="user.id">
        <td><img class="avatar" :src="user.avatar ? 'storage/' + user.avatar : 'storage/avatars/default.png'" alt="">
        </td>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
        <td>{{ formatDate(user.created_at) }}</td>
        <td v-if="acl.can_delete_user"><button class="bg-red-500 w-6 h-6 rounded-full"></button></td>
      </tr>
    </tbody>
  </table>
  <div>
    <Pagination :paginator="users" />
  </div>
</template>
