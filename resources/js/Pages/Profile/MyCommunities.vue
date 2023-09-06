<template>
    <div class="col d-flex flex-column">
      <form @submit.prevent="submitUpdate"> 
        <div class="card-body">
          <h2 class="mb-4">Minhas Comunidades</h2>
          <h3 class="card-title">Comunidade Sugar</h3> 
          <label class="form-check form-check-inline" v-if="user.gender === 'Homem'">
            <input class="form-check-input" type="checkbox" v-model="form.sugar_daddy">
            <span class="form-check-label">Sugar Daddy</span>
          </label>
          <label class="form-check form-check-inline" v-if="user.gender === 'Mulher'">
            <input class="form-check-input" type="checkbox" v-model="form.sugar_mommy">
            <span class="form-check-label">Sugar Mommy</span>
          </label>
          <label class="form-check form-check-inline" v-if="form.sugar_daddy != true">
            <input class="form-check-input" type="checkbox" v-model="form.sugar_baby">
            <span class="form-check-label">Sugar Baby</span>
          </label>
          <h3 class="card-title mt-3">Comunidade Bondage</h3> 
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" v-model="form.bondage">
            <span class="form-check-label">Bondage</span>
          </label>
          <h3 class="card-title mt-3">Comunidade Cuckold</h3> 
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" v-model="form.cuckold">
            <span class="form-check-label">Cuckold</span>
          </label>
          <h3 class="card-title mt-3">Comunidade Podolatria</h3>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" v-model="form.podolatry">
            <span class="form-check-label">Podolatria</span>
          </label> 
          <h3 class="card-title mt-3">Comunidade Submissão</h3>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" v-model="form.submissive">
            <span class="form-check-label">Submisso</span>
          </label>
          <label class="form-check form-check-inline" v-if="user.gender === 'Mulher'">
            <input class="form-check-input" type="checkbox" v-model="form.domme">
            <span class="form-check-label">Domme</span>
          </label>
          <label class="form-check form-check-inline" v-if="user.gender === 'Homem'">
            <input class="form-check-input" type="checkbox" v-model="form.master">
            <span class="form-check-label">Master</span>
          </label>
          <h3 class="card-title mt-3">Comunidade Thresome</h3>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" v-model="form.thresome">
            <span class="form-check-label">Thresome</span>
          </label>
        </div>
        <div class="card-footer bg-transparent mt-5">
          <div class="btn-list justify-content-end">
            <button type="submit" class="btn btn-primary">
              Atulizar Comunidades
            </button>
          </div>
        </div>
      </form>
    </div>
  
</template>

<script setup>
import {usePage, useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';


const user = usePage().props.auth.user;
const form = useForm({
    sugar_daddy: !!user.sugar_daddy,
    sugar_mommy: !!user.sugar_mommy,
    sugar_baby: !!user.sugar_baby,
    bondage: !!user.bondage,
    cuckold: !!user.cuckold,
    podolatry: !!user.podolatry,
    submissive: !!user.submissive,
    domme: !!user.domme,
    master: !!user.master,
    thresome: !!user.thresome,
});

const submitUpdate = () =>{
  form.patch(route('profile.communities.update'),{
    onSuccess: (response) =>{
      notify('success','Comunidades Atualizadas')
      router.visit(route("profile.edit"),{ preserveScroll:true})
    },onError: (response)=>{
      notify('error','Algum erro aconteceu, tente novamente.')
    }
  })
}


const notify = (type,msg) => {
  if (type == 'success'){
      toast.success(msg, {
      autoClose: 2000,
    });
  } else if(type == 'error'){
      toast.error(msg, {
      autoClose: 3000,
    });
  }
}

</script>