<template>
  <header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
    <div class="container-xl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <Link :href="route('dashboard')">
        <div class="d-flex">
          <img src="@/assets/images/logo_icon_fetita.png" height="35" alt="">
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">FETITA</h1>
        </div>
      </Link>
      <div class="navbar-nav flex-row order-md-last">
        <div class="nav-item dropdown">
          <div>
            <Link :href="route('login')" class="nav-link-title">
              <span class="text-white pe-1">Login</span>
            </Link>
            |
            <Link :href="route('register')" class="nav-link-title">
              <span class="text-white ps-1">Registrar</span>
            </Link>
          </div>
          

        </div>
      </div>
    </div>
  </header>
  <div class="page">
    <div class="page-wrapper">
      <slot></slot>
    </div>
  </div>
  <Footer />
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Footer from "./Footer.vue";
</script>
