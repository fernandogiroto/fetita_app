<template>
  <Head title="Registrar"/>
  <div class="row g-0 flex-fill">
    <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-danger d-flex flex-column justify-content-center">
      <div class="container container-tight my-1 px-lg-5">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"></a>
        </div>
        <h2 class="h3 text-center mb-3">
          Registrar
        </h2>
        <form @submit.prevent="submit">
          <div>
            <TextInput id="name" type="text" class="form-control" v-model="form.name" required  autocomplete="name" placeholder="Nome" />
            <InputError class="mt-2 text-danger" :message="form.errors.name" />
          </div>

          <div class="mt-2">
            <TextInput id="surname" type="text" class="form-control" v-model="form.surname" required autocomplete="surname" placeholder="Sobrenome" />
            <InputError class="mt-2 text-danger" :message="form.errors.surname" />
          </div>

          <div class="mt-2">
            <TextInput id="email" type="email" class="form-control" v-model="form.email" required autocomplete="email" placeholder="Email"/>
            <InputError class="mt-2 text-danger" :message="form.errors.email" />
          </div>

          <div class="mt-2">
            <TextInput id="password" type="password" class="form-control" v-model="form.password" required autocomplete="new-password" placeholder="Senha"/>
            <InputError class="mt-2 text-danger" :message="form.errors.password" />
          </div>
          
          <div class="mt-3">
            <InputLabel value="Nascimento" />
            <div class="input-icon mb-2">
              <input class="form-control " placeholder="Data de Nascimento" id="datepicker-icon" data-mask="00/00/0000" v-model="form.birthdate" type="date">
            </div>
            <InputError class="mt-2 text-danger" :message="form.errors.birthdate" />
          </div>
          <div class="mt-2">
            <InputLabel for="name" value="Selecione o país" />
            <select class="form-select" v-model="form.country_id">
              <option value="1">Brasil</option>
              <option value="2">Portugal</option>
              <option value="3">Espanha</option>
            </select>
            <InputError class="mt-2 text-danger" :message="form.errors.country_id" />
          </div>
          <div class="mt-2">
            <InputLabel for="name" value="Selecione o gênero" />
            <select class="form-select" v-model="form.gender">
              <option>Homem</option>
              <option>Mulher</option>
              <option>Homem Transgênero</option>
              <option>Mulher Transgênero</option>
              <option>Não-Binário</option>
            </select>
            <InputError class="mt-2 text-danger" :message="form.errors.gender" />
          </div>

          <!-- <div class="mt-4">
            <InputLabel for="password_confirmation" value="Confirm Password" />
            <TextInput id="password_confirmation" type="password" class="block w-full mt-1" v-model="form.password_confirmation" required autocomplete="new-password" />
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
          </div> -->

          <div class="flex items-center justify-end mt-4">
              <PrimaryButton class="btn btn-primary w-100" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Fazer Registro
            </PrimaryButton>
          </div>
        </form>


        <div class="text-center text-muted mt-3">
          <Link :href="route('login')">Já tem registro?</Link>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
      <div class="bg-cover h-100 min-vh-100 background-login"></div>
    </div>
  </div>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
  surname: '',
  gender:'',
  country_id: '',
  birthdate: null,
  email: '',
  password: '',
  password_confirmation: '',
  terms: false,
});
const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>
