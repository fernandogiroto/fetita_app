
<template>
    <Head title="Sugar"/>
    <AppLayout>
        <template #content>
          <!-- Page header -->
          <div class="page-banner page-sugar overlay-dark d-print-none">
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
                      <img src="@/Assets/images/sugar.png" class="info-comunity-img">
                      <h3 class="mb-1">COMUNIDADE SUGAR</h3>
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
                                    sugarDaddy: true,
                                    sugarMommy: true,
                                    sugarBaby: true
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
                          <div class="tab-pane" id="tabs-new-users" role="tabpanel">
                            <div class="row row-cards">
                              <div class="col-md-6 col-lg-2" v-for="user in users_new.data">
                                <Link :href="route('user.profile',{nickname: user.nickname})" class="text-decoration-none">
                                  <div class="card">
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
              <section>
                <div class="row row-cards pt-5">
                  <div class="col-lg-6 pe-5">
                    <h2>O que é a fantasia sugar?</h2>
                    <p class="text-justify">Sugar Daddy é um termo utilizado para descrever um homem mais velho e financeiramente bem-sucedido que 
                    oferece apoio financeiro e presentes luxuosos a uma pessoa mais jovem, geralmente uma mulher, em troca de
                    companhia, relacionamento ou amizade. O conceito de "sugar daddy" está enraizado na dinâmica de 
                    "relacionamento patrocinado", onde o homem, conhecido como o sugar daddy, desfruta da companhia e atenção 
                    da pessoa mais jovem, conhecida como "sugar baby", que, por sua vez, recebe benefícios materiais e financeiros.
                    </p>
                    <p class="text-justify">
                    Essa relação costuma ser consensual e estabelece uma espécie de acordo ou "arranjo" entre ambas as partes, 
                    onde os termos e condições do relacionamento são discutidos e acordados antecipadamente. Embora haja casos
                    em que esses arranjos evoluem para relacionamentos emocionais genuínos, muitas vezes, a principal motivação 
                    é a troca de suporte financeiro por companhia e atenção.
                    </p>
                  </div>
                  <div class="col-lg-6 sugar-info-image ps-5">
                  </div>
                </div>
              </section>  
            </div>
          </div>
          <!-- MODAL -->
          <div class="modal modal-blur fade" id="modal-success" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
              <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>  
                <form @submit.prevent="subscribe">
                  <div class="modal-body text-center py-4">
                    <h3>Entrar na comunidade como</h3>
                      <select class="form-select" v-model="userSugarPreference">
                        <option >Sugar Daddy </option>
                        <option>Sugar Mommy</option>
                        <option>Sugar Baby</option>
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
        </template>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, useForm, Link, usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import {ref} from 'vue';

const props = defineProps({
  users: Object,
  users_new: Object,
  users_count: Number,
  user: Object,
  userBelongsToComunity: Boolean
});

const userSugarPreference = ref(null);
const userBelongsToComunity = ref(props.userBelongsToComunity);
const userChoice = ref(null);
const user = usePage().props.auth.user;
const form = useForm({
  sugar_selected: null,
});

const subscribe = () => {
  form.sugar_selected = userSugarPreference.value
    form.put(route('comunidades.sugar.subscribre'), {
        preserveScroll: true,
        onSuccess: (response) => {
          userBelongsToComunity.value = true;
          userChoice.value = userSugarPreference.value;
          userSugarPreference.value = null;
          console.log(response)
        }
    });
};

const unSubscribe = () => {
  form.sugar_selected = null
    form.put(route('comunidades.sugar.unsubscribre'), {
        preserveScroll: true,
        onSuccess: (response) => {
          userBelongsToComunity.value = false;
          userChoice.value = null;
        }
    });
};

onMounted(() => {
  if (user.sugar_daddy){
    userChoice.value = "Sugar Daddy"
  }
  if (user.sugar_mommy){
    userChoice.value = "Sugar Mommy"
  }
  if (user.sugar_baby){
    userChoice.value = "Sugar Baby"
  }
});

</script>