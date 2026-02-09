export default defineNuxtRouteMiddleware(async () => {
  const route = useRoute()

  // Only apply subdomain redirect AFTER login
  // Never auto-redirect on root entry
  if (route.path !== '/') return

  return navigateTo('/login')
})
