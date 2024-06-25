<script setup>
import { useForm } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
  avatar: null,
  preview: null,
})

const submit = () => {
  form.post('/register', {
    onError: () => {
      form.reset('password', 'password_confirmation')
    }
  })
}

const onAvatarChange = (e) => {
  form.avatar = e.target.files[0];
  form.preview = URL.createObjectURL(e.target.files[0]);
}
</script>
<template>

  <Head title="Register" />
  <h1 class="title">Register a new account</h1>
  <div class="w-2/4 mx-auto">
    <form @submit.prevent="submit">
      <div class="grid place-items-center">
        <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300">
          <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
            <span class="bg-white/70 pb-2 text-center">Avatar</span>
          </label>
          <input type="file" id="avatar" @change="onAvatarChange" hidden/>
          <img :src="form.preview ?? 'storage/avatars/default.png'" class="object-cover w-28 h-28" alt="">
        </div>
        <p v-if="form.errors.avatar" class="error">{{ form.errors.avatar }}</p>
      </div>
      <TextInput label="Name" v-model="form.name" :message="form.errors.name" />
      <TextInput label="Email" v-model="form.email" :message="form.errors.email" type="email" />
      <TextInput label="Password" v-model="form.password" :message="form.errors.password" type="password" />
      <TextInput label="Confirm Password" v-model="form.password_confirmation" type="password" />
      <div>
        <p class="text-slate-600 mb-2">Already have an account?
          <Link :href="route('login')" class="text-link">Login</Link>
        </p>
        <button class="primary-btn" :disabled="form.processing">Register</button>
      </div>
    </form>
  </div>
</template>
