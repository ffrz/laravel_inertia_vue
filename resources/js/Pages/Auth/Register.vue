<script setup>
import { useForm } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})

const submit = () => {
  form.post('/register', {
    onError: () => {
      form.reset('password', 'password_confirmation')
    }
  })
}
</script>
<template>

  <Head title="Register" />
  <h1 class="title">Register a new account</h1>
  <div class="w-2/4 mx-auto">
    <form @submit.prevent="submit">
      <TextInput label="Name" v-model="form.name" :message="form.errors.name"/>
      <TextInput label="Email" v-model="form.email" :message="form.errors.email"/>
      <TextInput label="Password" v-model="form.password" :message="form.errors.password"/>
      <TextInput label="Confirm Password" v-model="form.password_confirmation"/>
      <div>
        <p class="text-slate-600 mb-2">Already have an account? <a href="#" class="text-link">Login</a></p>
        <button class="primary-btn">Register</button>
      </div>
    </form>
  </div>
</template>
