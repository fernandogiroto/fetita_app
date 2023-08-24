
<template>
  <Head title="Sugar"/>
  <AppLayout>
      <template #content>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="row g-0">
                <div class="col-3 d-none d-md-block border-end">
                  <div class="card-body">
                    <h4 class="subheader">Perfíl e Configurações</h4>
                    <div class="list-group list-group-transparent">
                      <a
                        @click="changeTab('my-account')"
                        class="list-group-item list-group-item-action d-flex align-items-center pointer"
                        :class="{ active: tab === 'my-account' }">
                        Minnha Conta
                      </a>
                      <a 
                        @click="changeTab('my-communities')" 
                        class="list-group-item list-group-item-action d-flex align-items-center pointer"
                        :class="{ active: tab === 'my-communities' }">
                        Comunidades
                      </a>
                    </div>
                  </div>
                </div>
                <Information v-if="tab==='my-account'"></Information>
                <MyCommunities v-if="tab==='my-communities'"></MyCommunities>
              </div>
            </div>
          </div>
        </div>
      </template>
  </AppLayout>
</template>

<script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import Information from '@/Pages/Profile/Information.vue'
  import MyCommunities from '@/Pages/Profile/MyCommunities.vue'
  import { Head } from '@inertiajs/vue3';
  import { ref } from 'vue';

  const tab = ref('my-account');

  function changeTab(openTab){
    tab.value = openTab;
  }


</script>
 

