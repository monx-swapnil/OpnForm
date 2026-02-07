<script setup>
import LoginForm from "~/components/pages/auth/components/LoginForm.vue"

definePageMeta({
  layout: false,
  middleware: "guest",
})

useOpnSeoMeta({
  title: "Login",
})
</script>

<template>
  <div class="flex min-h-screen items-center justify-center">
    <div class="w-full max-w-md px-4">
      <div class="border rounded-md p-6 shadow-md">
        <h2 class="font-semibold text-2xl">
          Login to Equence
        </h2>
        <p class="text-sm text-neutral-500 mb-4">
          Please enter your details.
        </p>

        <LoginForm />

        <!-- Test credentials -->
        <div class="mt-4 text-sm text-neutral-500 text-center">
          <p class="font-semibold">Test credentials</p>
          <p>Email: <code>test@equence.dev</code></p>
          <p>Password: <code>password123</code></p>
        </div>
      </div>
    </div>
  </div>
</template>
