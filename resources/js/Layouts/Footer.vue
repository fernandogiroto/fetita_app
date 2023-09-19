<template>
    <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
          <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                  <Link :href="route('terms_conditions')" class="text-decoration-none text-dark">Termos de Uso</Link>
                </li>
                <li class="list-inline-item">
                  <Link :href="route('contact')" class="text-decoration-none text-dark">Contato</Link>
                </li>
                <li class="list-inline-item">
                  <Link :href="route('privacy_policy')" class="text-decoration-none text-dark">Política de Privacidade</Link>
                </li>
              </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                  Fetita - Portal do Fetish &copy; 2023 - Todos os direitos reservados
                </li>
              </ul>
            </div>
          </div>
        </div>
    </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>