<template>
<Head title="Portal do Fetish"/>
 <GuestLayout>   
    <!-- Banner Intro -->
    <div class="page-header page-dashboard-website overlay-dark mt-0 d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center overlay-content">
            <div class="col-6">
                <div class="page-pretitle text-white">
                Portal do Fetish
                </div>
                <h2 class="page-title-lg text-white">
                Descubra os prazeres das <span class="highlight">fantasias e fetiches</span>
                </h2>
                <div class="markdown text-white">
                Bem-vindo ao portal das fantias e fetiches, onde as fronteiras do desejo são empurradas para além dos 
                limites convencionais. Aqui, a imaginação se transforma em realidade e os desejos mais 
                profundos encontram liberdade para se manifestar.
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="page-body">
        <div class="container-xl">
            <section class="pb-0">
                <div class="row">
                    <div class="page-pretitle">
                        Venha conhecer
                    </div>
                    <h2 class="mb-3">Comunidades</h2>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <Link :href="route('register')" class="text-decoration-none"> 
                            <div class="card">
                                <div class="img-responsive img-responsive-21x9 card-img-top image-background sugar-card-background" ></div>
                                <div class="card-body">
                                    <h3 class="card-title">Sugar Daddy/Mommy</h3>
                                    <p class="text-secondary text-justify">No mundo da cumplicidade, o "sugar daddy" guia com mimos uma jornada luxuosa.</p>
                                </div>
                            </div>
                        </Link>
                      </div>
                      <div class="col-md-6 col-lg-4 mb-5">
                        
                        <Link :href="route('register')" class="text-decoration-none"> 
                        <div class="card">
                          <div class="img-responsive img-responsive-21x9 card-img-top image-background submision-card-background"></div>
                          <div class="card-body">
                            <h3 class="card-title">Submissão</h3>
                            <p class="text-secondary text-justify">Na entrega da submissão, desenha-se uma dança íntima de confiança, idolatria e desejo.</p>
                          </div>
                        
                        </div>
                    </Link>
                      </div>
                      <div class="col-md-6 col-lg-4 mb-5">
                        <Link :href="route('register')" class="text-decoration-none"> 
                        <div class="card">
                          <div class="img-responsive img-responsive-21x9 card-img-top image-background bondage-card-background"></div>
                          <div class="card-body">
                            <h3 class="card-title">Bondage</h3>
                            <p class="text-secondary text-justify">Explorando desejos, cordas e confiança criam universo íntimo de bondage. Vivenciando limites.</p>
                          </div>
                        
                        </div>
                    </Link>
                        
                      </div>
                      <div class="col-md-6 col-lg-4 mb-5">
                        <Link :href="route('register')" class="text-decoration-none"> 
                        <div class="card">
                          <div class="img-responsive img-responsive-21x9 card-img-top image-background cuckold-card-background"></div>
                          <div class="card-body">
                            <h3 class="card-title">Cuckold</h3>
                            <p class="text-secondary text-justify">No universo do cuckold, a paixão e a seduzação se ampliam ao compartilhar a intimidade.</p>
                          </div>
                        
                        </div>
                    </Link>
                        
                      </div>
                      <div class="col-md-6 col-lg-4 mb-5">
                        <Link :href="route('register')" class="text-decoration-none"> 
                        <div class="card">
                          <div class="img-responsive img-responsive-21x9 card-img-top image-background podolatry-card-background"></div>
                          <div class="card-body">
                            <h3 class="card-title">Podolatria</h3>
                            <p class="text-secondary text-justify">Explorando desejos ocultos, a podolatria revela paixões intensas e universos sensuais..</p>
                          </div>
                        
                        </div>
                    </Link>
                        
                      </div>
                      <div class="col-md-6 col-lg-4 mb-5">
                        <Link :href="route('register')" class="text-decoration-none"> 
                            <div class="card">
                                <div class="img-responsive img-responsive-21x9 card-img-top image-background thresome-card-background"></div>
                                <div class="card-body">
                                    <h3 class="card-title">Thresome</h3>
                                    <p class="text-secondary text-justify">Desbravando fronteiras do prazer, no um convite para uma intimidade compartilhada.</p>
                                </div>
                            </div>
                        </Link>
                      </div>
                </div>
            </section>
        </div>
    </div>
</GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>


