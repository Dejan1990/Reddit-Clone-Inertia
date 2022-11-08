<template>
  <guest-layout>
    <div class="flex justify-end m-2 p-2">
      <Link
        v-if="$page.props.auth.auth_check"
        :href="route('communities.posts.create', community.slug)"
        class="px-4 py-2 rounded bg-indigo-500 hover:bg-indigo-600 text-white"
      >
        Create Post
      </Link>
    </div>
    <h1>Community {{ community.name }} show page</h1>
  </guest-layout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  community: Object(),
});
</script>