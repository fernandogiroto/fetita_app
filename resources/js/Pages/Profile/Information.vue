<template>
    <div class="col d-flex flex-column">
        <div class="card-body">
          <h2 class="mb-4">{{user.name}} / Minha Conta</h2>
          <h3 class="card-title">Foto de Perfíl</h3>
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
                <p class="text-danger" v-if="form.errors.nickname">{{form.errors.nickname}}</p>

              </div>
              <div class="col-md">
                <div class="form-label">Nome</div>
                <input type="text" class="form-control" v-model="form.name">
                <p class="text-danger" v-if="form.errors.name">{{form.errors.name}}</p>
              </div>
              <div class="col-md">
                <div class="form-label">Sobrenome</div>
                <input type="text" class="form-control" v-model="form.surname">
                <p class="text-danger" v-if="form.errors.surname">{{form.errors.surname}}</p>

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
                <p class="text-danger" v-if="form.errors.gender">{{form.errors.gender}}</p>
                
              </div>
            </div>
            <div>
              <div class="row g-3 mt-2">
                <div class="col-md-4">
                  <div class="form-label">País</div>
                    <select class="form-select" v-model="form.country">
                      <option v-for="country in countrys" :key="country.id" :selected="form.country">{{country.name}}</option>
                    </select>
                    <p class="text-danger" v-if="form.errors.country">{{form.errors.country}}</p>

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
              <p class="text-danger" v-if="form.errors.description">{{form.errors.description}}</p>
            </div>
            <!-- <h3 class="card-title mt-4">Senha</h3>
            <p class="card-subtitle">Pode definir uma palavra-passe permanente se não pretender utilizar códigos de início de sessão temporários.</p>
            <div>
              <a href="#" class="btn">
                Nova Senha
              </a>
            </div> -->
            <h3 class="card-title mt-4">Perfíl Público</h3>
            <p class="card-subtitle">Tornar o seu perfil público significa que qualquer pessoa no portal poderá encontrá-lo.</p>
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
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

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
      notify('success','Perfil Atualizado')
      router.visit(route("profile.edit"),{ preserveScroll:true})
    },onError: (response)=>{
      notify('error','Corrija os erros e tente novamente')
    }
  })
}

const submitAvatar = () => {
  const formData = new FormData();
  formData.append('avatar', avatarform.avatar.value);
  avatarform.post(route("profile.update.avatar"), {
    onSuccess: (response) =>{
      notify('success','Perfil Atualizado')
      avatar.value = response.props.user.avatar
      avatarform.avatar.value = null;
      avatarInput.value = null
      router.visit(route("profile.edit"),{  preserveScroll:true})
    },onError:(response)=>{
      notify('error','Corrija os erros e tente novamente')
    },
    
      forceFormData: true,
      
  });
};

const deleteAvatar = () => {
  avatarform.post(route("profile.delete.avatar"), {
    onSuccess: () =>{
      avatar.value = avatarDefault
      notify('success','Imagem apagada com sucesso')
      router.reload({
        preserveScroll: true
      });
    },onError:(response)=>{
      notify('error','Erro ao tentar apagar imagem')
    },
  });
};
</script>