<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div>
    <header>
      <nav>
        <div class="space-x-6">
          <Link :href="route('home')" class="nav-link" :class="{ 'bg-slate-700': $page.component === 'Home' }">Home
          </Link>
        </div>
        <div>
          <div v-if="$page.props.auth.user" class="space-x-6 flex">
            <img class="avatar"
              :src="$page.props.auth.user.avatar ? 'storage/' + $page.props.auth.user.avatar : ('storage/avatars/default.png')"
              alt="avatar">
            <Link :href="route('dashboard')" class="nav-link"
              :class="{ 'bg-slate-700': $page.component === 'Dashboard' }">Dashboard</Link>
            <Link :href="route('logout')" method="post" as="button" type="button" class="nav-link">Logout</Link>
          </div>
          <div v-else class="space-x-6">
            <Link :href="route('register')" class="nav-link"
              :class="{ 'bg-slate-700': $page.component === 'Auth/Register' }">Register</Link>
            <Link :href="route('login')" class="nav-link" :class="{ 'bg-slate-700': $page.component === 'Auth/Login' }">
            Login</Link>
          </div>
        </div>
      </nav>
    </header>
    <main class="p-4">
      <p v-if="$page.props.flashMessages.success" class="p-4 bg-green-200">{{ $page.props.flashMessages.success }}</p>
      <p v-if="$page.props.flashMessages.warning" class="p-4 bg-yellow-200">{{ $page.props.flashMessages.warning }}</p>
      <p v-if="$page.props.flashMessages.error" class="p-4 bg-red-200">{{ $page.props.flashMessages.error }}</p>
      <slot></slot>
    </main>
  </div>
</template>
