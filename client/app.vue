<template>
  <AppProvider>
    <div
      id="app"
      class="bg-white dark:bg-notion-dark"
    >
      <NuxtLoadingIndicator color="#2563eb" />
      <NuxtLayout>
        <NuxtPage />
      </NuxtLayout>

      <!-- Third-party services and modals - only load when not on public form pages -->
      <ClientOnly v-if="!isPublicFormPage">
        <div
          class="fixed z-[9999] left-0 bottom-0 p-4" id="admin-actions"
        >
          <UButtonGroup size="sm">
            <ToolsStopImpersonation />
          </UButtonGroup>
        </div>

        <Clarity />
        <FeatureBase />
        <SubscriptionModal />
        <QuickRegister />
      </ClientOnly>
    </div>
  </AppProvider>
</template>

<script setup>
import FeatureBase from "~/components/vendor/FeatureBase.vue"
import Clarity from "~/components/vendor/Clarity.vue"

const config = useRuntimeConfig()
const route = useRoute()

// Check if current page is a public form page (for performance optimization)
const isPublicFormPage = computed(() => route.name === 'forms-slug')

// SEO and head configuration
useOpnSeoMeta({
  title: "Equence – Smart Form Builder",
  description:
    "Build powerful and elegant forms with Equence. Unlimited submissions, seamless integrations, and full customization.",
  ogImage: "/img/social-preview.jpg",
  robots: () => {
    return config.public.env === "production" ? null : "noindex, nofollow"
  },
})

useHead({
  titleTemplate: (titleChunk) => {
    return titleChunk ? `${titleChunk} - Equence` : "Equence"
  },
  meta: [
    {
      name: 'mobile-web-app-capable',
      content: 'yes'
    },
    {
      name: 'apple-mobile-web-app-status-bar-style',
      content: 'black-translucent'
    },
  ],
  link: [
    {
      rel: 'icon',
      type: 'image/png',
      href: '/favicon.png'
    },
    {
      rel: 'apple-touch-icon',
      type: 'image/png',
      href: '/favicon.png'
    }
  ],
  htmlAttrs: () => ({
    dir: 'ltr'
  })
})
</script>
