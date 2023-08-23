<template>
    <h2>Website</h2>
    <Link :href="route('login')" class="nav-link">Login</Link>
    <Link :href="route('register')" class="nav-link">Register</Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>