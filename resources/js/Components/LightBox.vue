<template>
    <div class="row row-cols-6 g-3">
        <div class="col-3"
          v-for="(src, index) in imgsRef"
          :key="index"
          @click="() => showSingle(index)"
        >
          <div class="img-responsive img-responsive-1x1 border gallery-users" :style="`background-image: url(${src})`"></div>
        </div>
        <div class="col-3" v-if="myProfile && showAddImage < 4">
          <div class="img-responsive img-responsive-1x1 border gallery-users pointer" :style="`background-image: url(${plusImage})`" data-bs-toggle="modal" data-bs-target="#add-image-gallery"></div>
      </div>
    </div>
    <vue-easy-lightbox
    :visible="visibleRef"
    :imgs="imgsRef"
    :index="indexRef"
    @hide="onHide"
    >
    <template v-slot:toolbar="{ toolbarMethods }">
      <button>Delete</button>
    </template>
    </vue-easy-lightbox>

    <div class="modal modal-blur fade" id="add-image-gallery" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-dark"></div>
          <form @submit.prevent="submitImage">
            <div class="modal-body text-center py-4">
              <h3>Adicionar a Galeria</h3>
                <input type="file" @input="galerryForm.image = $event.target.files[0]" class="form-control" />
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <div class="row">
                  <div class="col">
                    <button type="submit" class="btn btn-dark w-100" data-bs-dismiss="modal">
                      Adicionar Imagem
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

<script setup>

const props = defineProps({
  images: null,
  myProfile: false
})

import plusImage from '@/Assets/Images/plus.png';
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

import {ref} from 'vue';
const visibleRef = ref(false);
const indexRef = ref(0);
const imgsRef = JSON.parse(props.images);
const showAddImage =  ref(imgsRef?.length ?? 0); ;

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

const onShow = () => {
  visibleRef.value = true
}
const showSingle = (index) => {
  indexRef.value = index;
  onShow()
}

const showMultiple = () => {
  imgsRef.value = props.images;
  indexRef.value = 0 
  onShow()
}
const onHide = () => (visibleRef.value = false);


const galerryForm = useForm({
    image: null,
});

const submitImage = () => {
  const formData = new FormData();
  formData.append('avatar', galerryForm.image.value);
  galerryForm.post(route("profile.update.gallery"), {
    onSuccess: (response) =>{
      console.log(response.props)
      notify('success','Imagem adicionada com sucesso')
      imgsRef.value =  JSON.parse(response.props.user.gallery); 
      router.visit(route("profile.edit"),
      { 
        only: ['images'],
        preserveScroll:true
      })
    },onError:(response)=>{
      console.log(response)
      notify('error',response.image)
    },
    
    forceFormData: true,
  });
};

</script>
 
<style>
</style>