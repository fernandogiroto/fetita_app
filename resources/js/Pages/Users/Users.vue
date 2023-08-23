
<template>
  <Head title="Users"/>
  <AppLayout>
      <template #content>
      <!-- Page header -->
      <div class="page-header overlay-dark d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center overlay-content">
              <div class="col">
                <div class="page-pretitle text-white">Lista de</div>
                <h2 class="page-title-md text-white">
                  Usuários 
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-wrapper">
          <div class="page-body">
            <div class="container-xl">
              <section>
                <div class="row g-4">
                  <div class="col-md-3 ">

                    <form class="sticky-top">
                      <div class="form-label">Usuário</div>
                      <input type="text" class="form-control mb-4" name="example-text-input" placeholder="Pesquise pelo nome"  v-model="search">
                      
                      <div class="form-label">Localização</div>
                      <div class="mb-4">
                        <label class="form-check">
                          <input type="checkbox" class="form-check-input" name="form-type[]" v-model="sugarDaddy">
                          <span class="form-check-label">Sugar Daddy</span>
                        </label>
                        <label class="form-check">
                          <input type="checkbox" class="form-check-input" name="form-type[]" v-model="sugarMommy">
                          <span class="form-check-label">Sugar Mommy</span>
                        </label>
                        <label class="form-check">
                          <input type="checkbox" class="form-check-input" name="form-type[]" v-model="submissive">
                          <span class="form-check-label">Submisso(a)</span>
                        </label>
                        <label class="form-check">
                          <input type="checkbox" class="form-check-input" name="form-type[]" v-model="bondage">
                          <span class="form-check-label">Bondage</span>
                        </label>
                        <label class="form-check">
                          <input type="checkbox" class="form-check-input" name="form-type[]" v-model="cuckold">
                          <span class="form-check-label">Cuckold</span>
                        </label>
                        <label class="form-check">
                          <input type="checkbox" class="form-check-input" name="form-type[]" v-model="podolatry">
                          <span class="form-check-label">Podolatria</span>
                        </label>
                        <label class="form-check">
                          <input type="checkbox" class="form-check-input" name="form-type[]" v-model="thresome">
                          <span class="form-check-label">Thresome</span>
                        </label>
                      </div>
                      <div class="form-label">Usuários </div>
                      <div class="mb-4">
                        <label class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" v-model="active">
                          <span class="form-check-label form-check-label-on">Apenas Online</span>
                          <span class="form-check-label form-check-label-off">Apenas Online</span>
                        </label>
                      </div>
                      <div class="form-label">Localização</div>
                      <div class="mb-4">
                        <select class="form-select" v-model="location">
                          <option value="no_location" selected>Localização</option>
                          <option v-for="location in locations" :key="location">{{location}}</option>
                        </select>
                      </div>
                      <div class="mt-5">
                        <a class="btn btn-primary w-100" @click="reset">
                          Limpar Filtros
                        </a>

                      </div>
                    </form>
                  </div>
                  <div class="col-md-9">
                    <div class="row row-cards">
                      <div class="col-sm-6 col-lg-3" v-for="user in users.data">
                      <Link :href="route('user.profile',{nickname: user.nickname})" class="text-decoration-none">
                        <div class="card card-sm">
                          
                          <img :src="`https://i.pravatar.cc/150?img=${user.id}`" class="card-img-top">
                          <span class="badge bg-lime badge-notification badge-blink" v-if="user.active"></span>
                          <div class="card-body">
                            <div class="d-flex align-items-center">
                              <div>
                                <div>{{user.name}} {{user.surname}}</div>
                                <div class="text-muted">{{user.location}}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </Link>
                      </div>
                    </div>
                    <Pagination class="mt-6" :links="users.links" />
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </template>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import {ref, watch} from 'vue';
import { router } from '@inertiajs/vue3'

import Pagination from '@/Components/Pagination.vue';


const props = defineProps({
  users: Object,
  locations: Object,
  filters: Object
})

let search = ref(props.filters.search);
let location = ref(props.filters.location);
let sugarDaddy = ref(!!props.filters.sugarDaddy);
let sugarMommy = ref(!!props.filters.sugarMommy);
let submissive = ref(props.filters.submissive);
let bondage = ref(props.filters.bondage);
let cuckold = ref(props.filters.cuckold);
let podolatry = ref(props.filters.podolatry);
let thresome = ref(props.filters.thresome);
let active = ref(props.filters.active);


watch(
  [search, location, sugarDaddy,sugarMommy,submissive,bondage,cuckold,podolatry,thresome,active],
  ([searchValue,locationValue,sugarDaddyValue,sugarMommyValue,submissiveValue,bondageValue,cuckoldValue,podolatryValue,thresomeValue,activeValue]) => {
    const queryParams = {};

    if (searchValue !== '') {queryParams.search = searchValue; }
    if (locationValue !== false && locationValue !== 'no_location') {queryParams.location = locationValue; }
    if (sugarDaddyValue !== false) {queryParams.sugarDaddy = sugarDaddyValue;}
    if (sugarMommyValue !== false) {queryParams.sugarMommy = sugarMommyValue;}
    if (submissiveValue !== false) {queryParams.submissive = submissiveValue;}
    if (bondageValue !== false) {queryParams.bondage = bondageValue;}
    if (cuckoldValue !== false) {queryParams.cuckold = cuckoldValue;}
    if (podolatryValue !== false) {queryParams.podolatry = podolatryValue;}
    if (thresomeValue !== false) {queryParams.thresome = thresomeValue;}
    if (activeValue !== false) {queryParams.active = activeValue;}

    router.get('/usuarios', queryParams, {
      preserveState:true,
      preserveScroll:true,
      replace:true,
    })
  }
);


const reset = ()=>{
  search.value= '';
  location.value=false, 
  sugarDaddy.value=false,
  sugarMommy.value=false,
  submissive.value=false,
  bondage.value=false,
  cuckold.value=false,
  podolatry.value=false,
  thresome.value=false

  router.get('/usuarios', {
      preserveState: true
  });

}




</script>