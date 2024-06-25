<script setup>
import Pagination from '../Components/Pagination.vue';

defineProps({
  users: Object
})

const formatDate = (date) =>
  new Date(date).toLocaleDateString("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
  })
</script>

<template>
  <Head title="Dashboard" />
  <table>
    <thead class="bg-slate-300">
      <tr>
        <th>Avatar</th>
        <th>Name</th>
        <th>Email</th>
        <th>Registration Date</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="user in users.data" :key="user.id">
        <td><img class="avatar" :src="user.avatar ? 'storage/' + user.avatar : 'storage/avatars/default.png'" alt="">
        </td>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
        <td>{{ formatDate(user.created_at) }}</td>
      </tr>
    </tbody>
  </table>
  <div>
    <Pagination :paginator="users" />
  </div>
</template>
