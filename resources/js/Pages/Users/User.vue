
<template>
    <Head :title="`Fetita - ${user.name} ${user.surname}`"/>
    <AppLayout>
        <template #content>
        <!-- Page header -->
        <div class="page-header page-user overlay-dark d-print-none">
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
                    <div class="img-responsive img-responsive-21x9 card-img-top" :style="`background-image: url(${avatar})`"></div>
                    <div class="card-body">
                      <div class="mb-3 text-danger">
                        <strong>{{user.name}} {{user.surname}}</strong>
                      </div>
                      <div class="mb-2" v-if="user.birthdate">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                        Idade: <strong> {{new Date().getFullYear() - user.birthdate?.substring(0, 4)}} anos</strong>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                        Localização: <strong><span v-bind:class="['flag','flag-country-' + user.country?.iso.toLowerCase()]"></span> {{user.country?.name}}</strong>
                      </div>
                      <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                        Gênero: <strong>{{user.gender}}</strong>
                      </div>
                      <div class="mb-2">
                        <p class="text-justify">{{user.description}}</p>
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
                      <ul class="list-unstyled">
                        <Link :href="route('comunidades.sugar')" ><li v-if="user.sugar_daddy" class="text-dark"><users-icon size="20"/> Sugar</li></Link>
                        <Link :href="route('comunidades.sugar')"><li v-if="user.sugar_mommy" class="text-dark"><users-icon size="20"/> Sugar</li></Link>
                        <Link :href="route('comunidades.sugar')"><li v-if="user.sugar_baby" class="text-dark"><users-icon size="20"/> Sugar</li></Link>
                        <Link :href="route('comunidades.submision')"><li v-if="user.submissive" class="text-dark"><users-icon size="20"/> Bdsm</li></Link>
                        <Link :href="route('comunidades.submision')"><li v-if="user.master" class="text-dark"><users-icon size="20"/> Bdsm</li></Link>
                        <Link :href="route('comunidades.submision')"><li v-if="user.domme" class="text-dark"><users-icon size="20"/> Bdsm</li></Link>
                        <Link :href="route('comunidades.bondage')"><li v-if="user.bondage" class="text-dark"><users-icon size="20"/> Bondage</li></Link>
                        <Link :href="route('comunidades.cuckold')"><li v-if="user.cuckold" class="text-dark"><users-icon size="20"/> Cuckold</li></Link>
                        <Link :href="route('comunidades.podolatry')"><li v-if="user.podolatry" class="text-dark"><users-icon size="20"/> Podolatria</li></Link>
                        <Link :href="route('comunidades.thresome')"><li v-if="user.thresome" class="text-dark"><users-icon size="20"/> Thresome</li></Link>
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
import { Head,Link } from '@inertiajs/vue3';
import {ref} from 'vue';
import { onMounted } from 'vue';

const props = defineProps(['user']);
const profilePhotoDefault = `https://i.pravatar.cc/150?img=10`;
const avatar = ref(props.user.avatar ?? profilePhotoDefault);

const getAvatar = function(){
  if(props.user.avatar){  
    avatar.value = `http://127.0.0.1:8000/storage${props.user.avatar}`;
  }else{
    avatar = profilePhotoDefault;
  }
}

onMounted(() => {
  getAvatar();
})

</script>