<template>
    <div class="col d-flex flex-column">
        <div class="card-body">
          <h2 class="mb-4">{{user.name}} / Minha Conta</h2>
          <h3 class="card-title">Detalhes da Conta</h3>
          <!-- USER IMAGE AVATAR -->
          <form @submit.prevent="submitAvatar">
            <div class="row align-items-center mb-3">
              <div class="col-auto">
                <span class="avatar avatar-xl" :style="`background-image: url(${avatar})`"></span>
              </div>
              <div class="col-auto">
                <input type="file" @input="avatarform.avatar = $event.target.files[0]" class="form-control" ref="avatarInput" />
              </div>
              <div class="col-auto">
                <button  class="btn" type="submit">
                  Atualizar
                </button>
              </div>
              <div class="col-auto">
                <a @click.prevent="deleteAvatar" class="btn btn-ghost-danger">
                  Excluir Imagem
                </a>
              </div>
            </div>
          </form>
          <!-- USER INFORMATION -->
          <form @submit.prevent="submitUpdate">
            <div class="row g-3">
              <div class="col-md">
                <div class="form-label">Usuário</div>
                <input type="text" class="form-control" v-model="form.nickname">
              </div>
              <div class="col-md">
                <div class="form-label">Nome</div>
                <input type="text" class="form-control" v-model="form.name">
              </div>
              <div class="col-md">
                <div class="form-label">Sobrenome</div>
                <input type="text" class="form-control" v-model="form.surname">
              </div>

              <div class="col-md">
                <div class="form-label">Gênero</div>
                <select class="form-select" v-model="form.gender">
                  <option >Homem</option>
                  <option >Mulher</option>
                  <option >Homem Transgênero</option>
                  <option >Mulher Transgênero</option>
                  <option >Não-Binário</option>
                </select>
              </div>
            </div>
            <div>
              <div class="row g-3 mt-2">
                <div class="col-md-4">
                  <div class="form-label">País</div>
                    <select class="form-select" v-model="form.country">
                      <option v-for="country in countrys" :key="country.id" :selected="form.country">{{country.name}}</option>
                    </select>
                  </div>
                <!-- <div class="col-md-4">
                  <div class="form-label">Estado</div>
                  <input type="text" class="form-control" :value="user.location">
                </div>
                <div class="col-md-4">
                  <div class="form-label">Cidade</div>
                  <input type="text" class="form-control" :value="user.location">
                </div> -->
              </div>
            </div>
            <div class="mt-2 mb-3 mb-0">
              <label class="form-label">Descrição</label>
              <textarea rows="5" class="form-control" placeholder="Escreva uma breve descrição sobre você" v-model="form.description"></textarea>
            </div>
            <h3 class="card-title mt-4">Email</h3>
            <div>
              <div class="row g-2">
                <div class="col-auto">
                  <input type="text" class="form-control w-auto" :value="user.email">
                </div>
                <div class="col-auto"><a href="#" class="btn">
                    Alterar
                  </a>
                </div>
              </div>
            </div>
            <h3 class="card-title mt-4">Senha</h3>
            <p class="card-subtitle">Pode definir uma palavra-passe permanente se não pretender utilizar códigos de início de sessão temporários.</p>
            <div>
              <a href="#" class="btn">
                Nova Senha
              </a>
            </div>
            <h3 class="card-title mt-4">Perfíl Público</h3>
            <p class="card-subtitle">{{visible}}Tornar o seu perfil público significa que qualquer pessoa no portal poderá encontrá-lo.</p>
            <div class="mb-5">
              <label class="form-check form-switch form-switch-lg">
                <input class="form-check-input" type="checkbox"  v-model="form.visible">
                <span class="form-check-label form-check-label-on">Você está visível </span>
                <span class="form-check-label form-check-label-off">Você está invisível</span>
              </label>
            </div>
            <label class="form-label">Minhas Fotos</label>
            <LightBox :images="user.gallery" :myProfile="true"></LightBox>
            <div class="card-footer bg-transparent mt-5">
              <div class="btn-list justify-content-end">
                <a href="#" class="btn">
                  Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                  Atulizar Informações
                </button>
              </div>
            </div>
          </form>
        </div>
    </div>
</template>

<script setup>
import { useForm,usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import { ref } from 'vue';
import LightBox from '@/Components/LightBox.vue'

const user = usePage().props.auth.user;
import avatarDefault from '@/Assets/Images/avatar-default.jpeg';

const avatar = ref(user.avatar ?? avatarDefault);
const avatarInput = ref(null);

const props = defineProps({
    countrys: Object
});

let visible = ref(!!user.visible);

const form = useForm({
    name: user.name,
    surname: user.surname,
    gender: user.gender,
    country: user.country?.name,
    email: user?.email,
    nickname: user.nickname,
    description: user.description,
    visible: !!user.visible
});

const avatarform = useForm({
    avatar: null,
});

const submitUpdate = () =>{
  form.patch(route('profile.update'),{
    onSuccess: (response) =>{
      router.visit(route("profile.edit"),
      { 
        preserveScroll:true
      })
    },
  })
}

const submitAvatar = () => {
  const formData = new FormData();
  formData.append('avatar', avatarform.avatar.value);
  avatarform.post(route("profile.update.avatar"), {
    onSuccess: (response) =>{
      avatar.value = response.props.user.avatar
      avatarform.avatar.value = null;
      avatarInput.value = null
      router.visit(route("profile.edit"),
      { 
        preserveScroll:true
      })
    },
      forceFormData: true,
  });
};

const deleteAvatar = () => {
  avatarform.post(route("profile.delete.avatar"), {
    onSuccess: () =>{
      avatar.value = avatarDefault
      router.reload({
        preserveScroll: true
      });
    }
  });
};
</script>