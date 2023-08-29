
<template>
    <Head title="Thresome"/>
    <AppLayout>
        <template #content>
        <!-- Page header -->
        <div class="page-contact overlay-dark d-print-none">
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
                      <img src="@/Assets/images/thresome.jpeg" class="info-comunity-img">
                      <h3 class="mb-1">COMUNIDADE THRESOME</h3>
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
                      </ul>
                    </div>
                    <div class="card-footer p-0">
                      
                      <form @submit.prevent="subscribe">
                        <button class="btn btn-primary btn-square w-100 p-3">
                          {{ form.thresome ? 'Sair da Comunidade' : 'Me Inscrever na Comunidade' }}
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <section>
                <div class="row row-deck row-cards pt-5">
                  <div class="col-12">
                    <div class="row row-cards">
                      <div class="col-10 mt-2">
                        <div class="page-pretitle">
                          Usuários
                        </div>
                        <h2 class="page-title">Usuários da Comunidade</h2>
                      </div>
                      <!-- ACTIVE USERS -->
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="card card border-0 shadow-none">
                      <div class="card-header card-header-cm-users shadow-none border-0 pb-5">
                        <ul class="nav nav-tabs card-header-tabs card-header-tabs-cm-users px-0" data-bs-toggle="tabs" role="tablist">
                          <li class="nav-item" role="presentation">
                            <a href="#tabs-active-users" class="nav-link active nav-link-users" data-bs-toggle="tab" aria-selected="true" role="tab">Ativos</a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a href="#tabs-new-users" class="nav-link nav-link-users" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Novos</a>
                          </li>
                          <li class="nav-item ms-auto" role="presentation">
                              <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                  <Link :href="route('usuarios', {
                                    thresome: true,
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
                          <div class="tab-pane active show" id="tabs-active-users" role="tabpanel">
                            <div class="row row-cards">
                              <div class="col-md-6 col-lg-2" v-for="user in users.data">
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
                          <div class="tab-pane" id="tabs-new-users" role="tabpanel">
                            <div class="row row-cards">
                              <div class="col-md-6 col-lg-2" v-for="user in users_new.data">
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
              <section>
                <div class="row row-cards pt-5">
                  <div class="col-lg-6 pe-5">
                    <h2>O que é a fantasia thresome?</h2>
                    <p class="text-justify">
                      A fantasia de threesome (ménage à trois) envolve o desejo ou interesse em participar de um encontro sexual
                       ou romântico com três pessoas. Essa fantasia pode se manifestar de diferentes maneiras, como dois parceiros
                        sexuais e uma terceira pessoa, ou três indivíduos que compartilham intimidade e experiências juntos.
                    </p>
                    <p class="text-justify">
                      Threesomes são fantasias relativamente comuns e podem ser motivados por uma variedade de fatores, incluindo 
                      curiosidade, desejo de novas experiências, busca por maior prazer sexual, exploração de dinâmicas de 
                      grupo ou até mesmo questões de poder e submissão.
                    </p>
                    <p class="text-justify">
                      É importante notar que a realização de um threesome requer comunicação aberta, confiança e consentimento 
                      de todas as partes envolvidas. Antes de prosseguir, é crucial que todos os parceiros estejam de acordo e 
                      confortáveis com a ideia. A falta de comunicação e consentimento claro pode levar a problemas emocionais,
                       conflitos e arrependimentos posteriores.
                    </p>
                  </div>
                  <div class="col-lg-6 thresome-info-image ps-5">
                  </div>
                </div>
              </section>  
            </div>
          </div>
        </template>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, useForm, Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
  users: Object,
  users_new: Object,
  users_count: Number,
  user: Object
});

const user = usePage().props.auth.user;

const form = useForm({
    subscribe: user.name,
    thresome: !!user.thresome
});

const subscribe = () => {
    form.thresome = !form.thresome;
    form.put(route('comunidades.thresome.subscribre'), {
        preserveScroll: true,
        onSuccess: (response) => {
          form.thresome = response.props.user.thresome;
          console.log(response)
        }
    });
};
</script>