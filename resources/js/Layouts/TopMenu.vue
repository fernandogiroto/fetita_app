<template>
  <header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
    <div class="container-xl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <Link :href="route('dashboard')">
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">Fetita</h1>
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
                <a class="dropdown-item" href="./layout-boxed.html">
                  Cuckold
                </a>
                <a class="dropdown-item" href="./layout-vertical.html">
                  Submissão
                </a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item" :class="{ 'active': $page.url === '/noticias' }">
          <Link :href="route('chat')" class="nav-link">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <confetti-icon size="20"/>
            </span>
            <span class="nav-link-title">
              Mensagens
            </span>
          </Link>
        </li>
      </ul>
      <div class="navbar-nav flex-row order-md-last">
        <div class="d-none d-md-flex" v-if="user?.name">
          <div class="nav-item dropdown d-none d-md-flex me-3">
            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
              <span class="badge bg-red"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Last updates</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                      <div class="col text-truncate">
                        <a href="#" class="text-body d-block">Example 1</a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          Change deprecated html tags to text decoration classes (#29604)
                        </div>
                      </div>
                      <div class="col-auto">
                        <a href="#" class="list-group-item-actions">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="status-dot d-block"></span></div>
                      <div class="col text-truncate">
                        <a href="#" class="text-body d-block">Example 2</a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          justify-content:between ⇒ justify-content:space-between (#29734)
                        </div>
                      </div>
                      <div class="col-auto">
                        <a href="#" class="list-group-item-actions show">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="status-dot d-block"></span></div>
                      <div class="col text-truncate">
                        <a href="#" class="text-body d-block">Example 3</a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          Update change-version.js (#29736)
                        </div>
                      </div>
                      <div class="col-auto">
                        <a href="#" class="list-group-item-actions">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                      <div class="col text-truncate">
                        <a href="#" class="text-body d-block">Example 4</a>
                        <div class="d-block text-muted text-truncate mt-n1">
                          Regenerate package-lock.json (#29730)
                        </div>
                      </div>
                      <div class="col-auto">
                        <a href="#" class="list-group-item-actions">
                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3';

const page = usePage();
const user = usePage().props.auth.user;

import avatarDefault from '@/Assets/Images/avatar-default.jpeg';
let avatar = user.avatar ?? avatarDefault;

</script>