
<template>
    <Head title="Submissão"/>
    <AppLayout>
        <template #content>
        <!-- Page header -->
        <div class="page-banner page-submision  overlay-dark d-print-none">
            <div class="container-xl">
            </div>
          </div>
          <!-- Page body -->
          <div class="page-body">
            <div class="container-xl">
              <div class="row row-cards page-info">
                <div class="col-lg-4">
                  <div class="card lex-grow-1">
                    <div class="card-body">
                      <img src="@/Assets/images/submision.png" class="info-comunity-img">
                      <h3 class="mb-1">COMUNIDADE BDSM</h3>
                      <div class="text-muted mb-3">
                        A short and simple permissive license with conditions only requiring preservation of copyright and
                        license. A short and simple permissive license with conditions only.
                      </div>
                      <ul class="list-unstyled space-y-1">
                        <li>
                          <div class="avatar-list avatar-list-stacked mb-3 d-flex align-items-center">
                            <span class="avatar avatar-sm rounded" style="background-image: url(https://i.pravatar.cc/300)"></span>
                            <span class="avatar avatar-sm rounded" style="background-image: url(https://i.pravatar.cc/301)"></span>
                            <span class="avatar avatar-sm rounded" style="background-image: url(https://i.pravatar.cc/302)"></span>
                            <span class="avatar avatar-sm rounded" style="background-image: url(https://i.pravatar.cc/303)"></span>
                            <span class="avatar avatar-sm rounded" style="background-image: url(https://i.pravatar.cc/304)"></span>
                            <span class="avatar avatar-sm rounded" style="background-image: url(https://i.pravatar.cc/305)"></span>
                            <span class="avatar avatar-sm rounded" style="background-image: url(https://i.pravatar.cc/306)"></span>
                            <span class="ps-4">{{users_count}} Membros </span>
                          </div>
                        </li>
                        <li v-if="userBelongsToComunity">
                          Você está inscrito como: 
                          <span class="text-danger">{{userChoice}}</span>
                        </li>
                      </ul>
                    </div>
                    <div class="card-footer p-0">
                      <button class="btn btn-primary btn-square w-100 p-3" data-bs-toggle="modal" data-bs-target="#modal-success" v-if="!userBelongsToComunity">Me Inscrever na Comunidade</button>
                      <form @submit.prevent="unSubscribe" v-else>
                        <button class="btn btn-primary btn-square w-100 p-3">
                          Sair da Comunidade
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- DOMME & MASTER -->
              <section>
                <div class="row row-deck row-cards pt-5">
                  <div class="col-12">
                    <div class="row row-cards">
                      <div class="col-10 mt-2">
                        <div class="page-pretitle">
                          Comunidade
                        </div>
                        <h2 class="page-title">Domme/Master</h2>
                      </div>
                      <!-- ACTIVE USERS -->
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card card border-0 shadow-none">
                      <div class="card-header card-header-cm-users shadow-none border-0 pb-5">
                        <ul class="nav nav-tabs card-header-tabs card-header-tabs-cm-users px-0" data-bs-toggle="tabs" role="tablist">
                          <li class="nav-item" role="presentation">
                            <a href="#tabs-users-submision-active" class="nav-link active nav-link-users" data-bs-toggle="tab" aria-selected="true" role="tab">Ativos</a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a href="#tabs-users-submision-new" class="nav-link nav-link-users" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Novos</a>
                          </li>
                          <li class="nav-item ms-auto" role="presentation">
                              <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                  <Link :href="route('usuarios', {
                                    domme: true,
                                    master: true
                                  })" class="btn btn-dark btn-users-cmg">
                                    Ver Todos
                                  </Link>
                                </span>
                              </div>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body card-body-cm-users px-0">
                        <div class="tab-content">
                          <div class="tab-pane active show" id="tabs-users-submision-active" role="tabpanel">
                            <div class="row row-cards">
                              <div class="col-md-6 col-lg-2" v-for="user in users_domme_master.data">
                                <Link :href="route('user.profile',{nickname: user.nickname})" class="text-decoration-none">
                                  <div class="card margin-effect-3">
                                    <div class="img-responsive img-responsive-9-16 card-img-top" :style="`background-image: url(${user.avatar})`"></div>
                                    <span class="badge bg-lime badge-notification badge-blink"></span>
                                    <div class="card-body py-2">
                                      <h3 class="card-title mb-0">{{user.name}} {{user.surname}}</h3>
                                      <p class="text-muted">{{user.country.name}}</p>
                                    </div>
                                  </div>
                                </Link>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="tabs-users-submision-new" role="tabpanel">
                            <div class="row row-cards">
                              <div class="col-md-6 col-lg-2" v-for="user in users_domme_master_new.data">
                                <Link :href="route('user.profile',{nickname: user.nickname})" class="text-decoration-none">
                                  <div class="card margin-effect-3">
                                    <div class="img-responsive img-responsive-9-16 card-img-top" :style="`background-image: url(${user.avatar})`"></div>
                                    <span class="badge bg-lime badge-notification badge-blink"></span>
                                    <div class="card-body py-2">
                                      <h3 class="card-title mb-0">{{user.name}} {{user.surname}}</h3>
                                      <p class="text-muted">{{user.country.name}}</p>
                                    </div>
                                  </div>
                                </Link>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>  
              <!-- SUBMISSE  -->
              <section >
                <div class="row row-deck row-cards">
                  <div class="col-12">
                    <div class="row row-cards">
                      <div class="col-10 mt-2">
                        <div class="page-pretitle">
                          Comunidade
                        </div>
                        <h2 class="page-title">Submisso/Submissa</h2>
                      </div>
                      <!-- ACTIVE USERS -->
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card card border-0 shadow-none">
                      <div class="card-header card-header-cm-users shadow-none border-0 pb-5">
                        <ul class="nav nav-tabs card-header-tabs card-header-tabs-cm-users px-0" data-bs-toggle="tabs" role="tablist">
                          <li class="nav-item" role="presentation">
                            <a href="#tabs-users-domme-master-active" class="nav-link active nav-link-users" data-bs-toggle="tab" aria-selected="true" role="tab">Ativos</a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a href="#tabs-users-domme-master-new" class="nav-link nav-link-users" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Novos</a>
                          </li>
                          <li class="nav-item ms-auto" role="presentation">
                              <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                  <Link :href="route('usuarios', {
                                    submision: true,
                                  })" class="btn btn-dark btn-users-cmg">
                                    Ver Todos
                                  </Link>
                                </span>
                              </div>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body card-body-cm-users px-0">
                        <div class="tab-content">
                          <div class="tab-pane active show" id="tabs-users-domme-master-active" role="tabpanel">
                            <div class="row row-cards">
                              <div class="col-md-6 col-lg-2" v-for="user in users_submision.data">
                                <Link :href="route('user.profile',{nickname: user.nickname})" class="text-decoration-none">
                                  <div class="card">
                                    <div class="img-responsive img-responsive-9-16 card-img-top" :style="`background-image: url(https://i.pravatar.cc/150?img=${user.id})`"></div>
                                    <span class="badge bg-lime badge-notification badge-blink"></span>
                                    <div class="card-body py-2">
                                      <h3 class="card-title mb-0">{{user.name}} {{user.surname}}</h3>
                                      <p class="text-muted">{{user.country.name}}</p>
                                    </div>
                                  </div>
                                </Link>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="tabs-users-domme-master-new" role="tabpanel">
                            <div class="row row-cards">
                              <div class="col-md-6 col-lg-2" v-for="user in users_submision_new.data">
                                <Link :href="route('user.profile',{nickname: user.nickname})" class="text-decoration-none">
                                  <div class="card">
                                    <div class="img-responsive img-responsive-9-16 card-img-top" :style="`background-image: url(https://i.pravatar.cc/150?img=${user.id})`"></div>
                                    <span class="badge bg-lime badge-notification badge-blink"></span>
                                    <div class="card-body py-2">
                                      <h3 class="card-title mb-0">{{user.name}} {{user.surname}}</h3>
                                      <p class="text-muted">{{user.country.name}}</p>
                                    </div>
                                  </div>
                                </Link>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>   
              <!-- DESCRIPTION  -->
              <section>
                <div class="row row-cards pt-5">
                  <div class="col-lg-6 pe-5">
                    <h2>O que é a fantasia de Submisão?</h2>
                    <p class="text-justify">A fantasia de submissão BDSM envolve um aspecto de jogos de poder e controle 
                      consensuais dentro do contexto de relações sexuais ou eróticas. BDSM é um acrônimo que se refere a 
                      Bondage e Disciplina (BD), Dominação e Submissão (DS) e Sadismo e Masoquismo (SM). A fantasia de 
                      submissão nesse contexto específico refere-se ao desejo de uma pessoa em assumir o papel de 
                      submisso(a), voluntariamente entregando parte do controle a um parceiro dominante.
                    </p>
                    <p class="text-justify">
                      Nesse cenário, a pessoa que assume o papel de submisso(a) geralmente encontra prazer na sensação de 
                      ser guiada, controlada ou até mesmo restringida pelo parceiro dominante. Isso pode envolver 
                      elementos como amarras, jogos de restrição, uso de acessórios, ordens e comandos, além de uma dinâmica
                      de poder que pode variar desde suave e leve até intensa e rigorosa, dependendo das preferências de
                      ambos os parceiros.
                    </p>
                  </div>
                  <div class="col-lg-6 submissive-info-image ps-5">
                  </div>
                </div>
              </section>  
              <!-- MODAL -->
              <div class="modal modal-blur fade" id="modal-success" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>  
                    <form @submit.prevent="subscribe">
                      <div class="modal-body text-center py-4">
                        <h3>Entrar na comunidade como</h3>
                          <select class="form-select" v-model="userSubmissivePreference">
                            <option>Domme</option>
                            <option>Mestre</option>
                            <option>Submisso(a)</option>
                          </select>
                      </div>
                      <div class="modal-footer">
                        <div class="w-100">
                          <div class="row">
                            <div class="col">
                              <button type="submit" class="btn btn-dark w-100" data-bs-dismiss="modal">
                                Entrar na Comunidade
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
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
import { Head, useForm, Link, usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import {ref} from 'vue';


const props = defineProps({
  users_submision: Object,
  users_submision_new: Object,
  users_domme_master: Object,
  users_domme_master_new: Object,
  users_count: Number,
  user: Object,
  userBelongsToComunity: Boolean
});

const userSubmissivePreference = ref(null);
const userBelongsToComunity = ref(props.userBelongsToComunity);
const userChoice = ref(null);
const user = usePage().props.auth.user;
const form = useForm({
  submsive_selected: null,
});

const subscribe = () => {
  form.submsive_selected = userSubmissivePreference.value
    form.put(route('comunidades.submision.subscribre'), {
        preserveScroll: true,
        onSuccess: (response) => {
          userBelongsToComunity.value = true;
          userChoice.value = userSubmissivePreference.value;
          userSubmissivePreference.value = null;
          console.log(response)
        }
    });
};

const unSubscribe = () => {
  form.submsive_selected = null
    form.put(route('comunidades.submision.unsubscribre'), {
        preserveScroll: true,
        onSuccess: (response) => {
          userBelongsToComunity.value = false;
          userChoice.value = null;
          console.log(response)
        }
    });
};

onMounted(() => {
  if (user.master){
    userChoice.value = "Mestre"
  }
  if (user.domme){
    userChoice.value = "Domme"
  }
  if (user.submissive){
    userChoice.value = "Submisso"
  }
})
</script>