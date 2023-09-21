<template>
  <header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
    <div class="container-xl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <Link :href="route('dashboard')" class="text-decoration-none">
        <div class="d-flex">
          <img src="@/assets/images/logo_icon_fetita.png" height="35" alt="">
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">FETITA</h1>
        </div>
      </Link>
      <ul class="navbar-nav">
        <li class="nav-item" :class="{ 'active': $page.url === '/como-funciona' }">
            <Link :href="route('usuarios')" class="nav-link">
              <span class="nav-link-icon d-md-none d-lg-inline-block"> <users-icon size="20"/> </span>
              <span class="nav-link-title"> Usuários </span>
            </Link>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <masks-theater-icon size="20"/>
            </span>
            <span class="nav-link-title">
              Fantasias & Fetishs
            </span>
          </a>
          <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <Link class="dropdown-item" :href="route('comunidades.sugar')">Sugar</Link>
                <Link class="dropdown-item" :href="route('comunidades.bondage')">Bondage</Link>
                <Link class="dropdown-item" :href="route('comunidades.cuckold')">Cuckold</Link>
                <Link class="dropdown-item" :href="route('comunidades.podolatry')">Podolatria</Link>
                <Link class="dropdown-item" :href="route('comunidades.submision')">Submisão</Link>
                <Link class="dropdown-item" :href="route('comunidades.thresome')">Thresome</Link>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item" :class="{ 'active': $page.url === '/noticias' }">
          <a href="/chat" class="nav-link">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <confetti-icon size="20"/>
            </span>
            <span class="nav-link-title">
              Mensagens
            </span>
          </a>
        </li>
      </ul>
      <div class="navbar-nav flex-row order-md-last">
        <div class="nav-item dropdown">
          <div v-if="user?.name">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
              <span class="avatar avatar-sm" :style="`background-image: url(${avatar})`"></span>
             <div class="d-none d-xl-block ps-2" >
               <div>{{user.name}} {{user.surname}}</div>
               <div class="mt-1 small text-muted">{{user.nickname}}</div>
             </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <Link :href="route('profile.edit')" class="dropdown-item">Meu Perfíl</Link>
              <a href="#" class="dropdown-item">Mensagens</a>
              <Link :href="route('logout')" method="post" class="dropdown-item" as="button">Deslogar</Link>
            </div>
          </div>
          <div v-else>
            <Link :href="route('login')" class="nav-link-title">
              <user-circle-icon size="22" class="nav-link-user"/> <span class="text-white">Login</span>
            </Link>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3';

const user = usePage().props.auth.user;

import avatarDefault from '@/Assets/Images/avatar-default.jpeg';
let avatar = user.avatar ?? avatarDefault;

</script>