<template>
    <div class="row row-cols-6 g-3">
        <div class="col-3"
          v-for="(src, index) in imgsRef"
          :key="index"
          @click="() => showSingle(index)"
        >
          <div class="img-responsive img-responsive-1x1 border gallery-users" :style="`background-image: url(${src})`"></div>
        </div>
    </div>
    <vue-easy-lightbox
    :visible="visibleRef"
    :imgs="imgsRef"
    :index="indexRef"
    @hide="onHide"
    >
        <template v-slot:toolbar="{ toolbarMethods }"></template>
    </vue-easy-lightbox>
</template>

<script setup>
const props = defineProps(['images']);
import {ref} from 'vue';
const visibleRef = ref(false);
const indexRef = ref(0);
const imgsRef = props.images;

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
const onHide = () => (visibleRef.value = false)
</script>
 