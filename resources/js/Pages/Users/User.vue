
<template>
    <Head :title="`Fetita - ${user.name} ${user.surname}`"/>
    <AppLayout>
        <template #content>
        <!-- Page header -->
        <div class="page-header overlay-dark d-print-none">
            <div class="container-xl">
              <div class="row g-2 align-items-center overlay-content">
                <div class="col">
                  <div class="page-pretitle text-white"> {{ user.nickname }} </div>
                  <h2 class="page-title-md text-white">
                    {{user.name}} {{user.surname}}
                  </h2>
                </div>
              </div>
            </div>
          </div>
          <!-- Page body -->
          <div class="page-body">
            <div class="container-xl">
              <div class="row row-cards mt-5">
                <div class="col-lg-4 pe-1">
                  <div class="card">
                    <div class="img-responsive img-responsive-21x9 card-img-top" :style="`background-image: url(https://i.pravatar.cc/150?img=${user.id})`"></div>
                    <div class="card-body">
                      <div class="card-title">{{user.name}} {{user.surname}}</div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                        Idade: <strong> 32 Anos</strong>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                        Localização: <strong><span class="flag flag-country-si"></span>
                          {{user.location}}</strong>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path><path d="M3 6l0 13"></path><path d="M12 6l0 13"></path><path d="M21 6l0 13"></path></svg>
                        Escolaridade: <strong>University of Ljubljana</strong>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path><path d="M12 12l0 .01"></path><path d="M3 13a20 20 0 0 0 18 0"></path></svg>
                        Profissão: <strong>Devpulse</strong>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l-2 0l9 -9l9 9l-2 0"></path><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                        Lives in: <strong>Šentilj v Slov. Goricah, Slovenia</strong>
                      </div>
                      <div>
                        <users-icon size="24" class="icon me-2 text-muted "/>
                        Cor e Etnia: <strong>Europe/Ljubljana</strong>
                      </div>
                      <div>
                        <search-icon size="24" class="icon me-2 text-muted mt-2"/>
                        Buscando: <strong>Europe/Ljubljana</strong>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary btn-square w-100 p-3">
                        Enivar Mensagem
                      </button> 
                    </div>
                  </div>
                  <div class="card mt-3">
                    <div class="card-body">
                      <h4>Comunidades</h4>
                      <ul class="list-unstyled space-y-1">
                        <li><users-icon size="20"/> Thresome</li>
                        <li><jump-rope-icon size="20"/> Submissão</li>
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card card-lg">
                    <div class="card-body py-3 px-3">
                      <LightBox :images="user.gallery"></LightBox>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </template>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import LightBox from '@/Components/LightBox.vue'
import { Head } from '@inertiajs/vue3';

defineProps(['user']);

</script>