@include('Chatify::layouts.headLinks')
<header class="navbar navbar-expand-md navbar-overlap d-print-none" data-bs-theme="dark">
  <div class="container-xl">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="/app">
      <div class="d-flex">
        <img src="../../../js/Assets/images/logo_icon_fetita.png" height="35" alt="">
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">FETITA</h1>
      </div>
    </a>
    <ul class="navbar-nav">
      <li class="nav-item" :class="{ 'active': $page.url === '/como-funciona' }">
          <a href="/usuarios" class="nav-link">
            <span class="nav-link-icon d-md-none d-lg-inline-block"> <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-users" width="20px" height="20px" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>   <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>   <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>   <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>   <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path> </svg> </span>
            <span class="nav-link-title"> Usuários </span>
          </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-masks-theater" width="20px" height="20px" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>   <path d="M13.192 9h6.616a2 2 0 0 1 1.992 2.183l-.567 6.182a4 4 0 0 1 -3.983 3.635h-1.5a4 4 0 0 1 -3.983 -3.635l-.567 -6.182a2 2 0 0 1 1.992 -2.183z"></path>   <path d="M15 13h.01"></path>   <path d="M18 13h.01"></path>   <path d="M15 16.5c1 .667 2 .667 3 0"></path>   <path d="M8.632 15.982a4.037 4.037 0 0 1 -.382 .018h-1.5a4 4 0 0 1 -3.983 -3.635l-.567 -6.182a2 2 0 0 1 1.992 -2.183h6.616a2 2 0 0 1 2 2"></path>   <path d="M6 8h.01"></path>   <path d="M9 8h.01"></path>   <path d="M6 12c.764 -.51 1.528 -.63 2.291 -.36"></path> </svg>
          </span>
          <span class="nav-link-title">
            Fantasias & Fetishs
          </span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="10" height="10" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M6 9l6 6l6 -6"></path>
         </svg>
        </a>
        <div class="dropdown-menu">
          <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
              
              <a class="dropdown-item" href="/comunidades/sugar">Sugar</a>
              <a class="dropdown-item" href="/comunidades/bondage">Bondage</a>
              <a class="dropdown-item" href="/comunidades/cuckold">Cuckold</a>
              <a class="dropdown-item" href="/comunidades/podolatria">Podolatria</a>
              <a class="dropdown-item" href="/comunidades/submisao">Submisão</a>
              <a class="dropdown-item" href="/comunidades/thresome">Thresome</a>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item" :class="{ 'active': $page.url === '/noticias' }">
        <a href="/chat" class="nav-link">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon-tabler icon-tabler-confetti" width="20px" height="20px" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>   <path d="M4 5h2"></path>   <path d="M5 4v2"></path>   <path d="M11.5 4l-.5 2"></path>   <path d="M18 5h2"></path>   <path d="M19 4v2"></path>   <path d="M15 9l-1 1"></path>   <path d="M18 13l2 -.5"></path>   <path d="M18 19h2"></path>   <path d="M19 18v2"></path>   <path d="M14 16.518l-6.518 -6.518l-4.39 9.58a1 1 0 0 0 1.329 1.329l9.579 -4.39z"></path> </svg>
          </span>
          <span class="nav-link-title">
            Mensagens
          </span>
        </a>
      </li>
    </ul>
    <div class="navbar-nav flex-row order-md-last">
      <div class="nav-item dropdown">
        <div v-if="user?.name">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm" :style="`background-image: url(${avatar})`"></span>
            <div class="d-none d-xl-block ps-2" >
              <div>{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
              <div class="mt-1 small text-muted">{{ Auth::user()->nickname }}</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="/perfil" class="dropdown-item">Meu Perfíl</a>
            <a href="/chat" class="dropdown-item">Mensagens</a>
            <a href="/logout" method="post" class="dropdown-item" as="button">Deslogar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
        {{-- Header and search bar --}}
        <div class="m-header">

            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="Pesquisar" />
            {{-- Tabs --}}
            {{-- <div class="messenger-listView-tabs">
                <a href="#" class="active-tab" data-view="users">
                    <span class="far fa-user"></span> Contacts</a>
            </div> --}}
        </div>
        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ User Tab ] ---------------- --}}
           <div class="show messenger-tab users-tab app-scroll" data-view="users">
               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title"><span>Favoritos</span></p>
                <div class="messenger-favorites app-scroll-hidden"></div>
               </div>
               {{-- Saved Messages --}}
               {{-- <p class="messenger-title"><span>Your Space</span></p>
               {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!} --}}
               {{-- Contact --}}
               <p class="messenger-title"><span>Mensagens</span></p>
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 500px);position: relative;"></div>
           </div>
             {{-- ---------------- [ Search Tab ] ---------------- --}}
           <div class="messenger-tab search-tab app-scroll" data-view="search">
                {{-- items --}}
                <p class="messenger-title"><span>Search</span></p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Digite para pesquisar..</span></p>
                </div>
             </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        {{-- header title [conversation name] amd buttons --}}
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- header back button, avatar and user name --}}
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- header buttons --}}
                {{-- <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="/dashboard"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav> --}}
            </nav>
            {{-- Internet connection --}}
            {{-- <div class="internet-connection">
                <span class="ic-connected">Connected</span>
                <span class="ic-connecting">Connecting...</span>
                <span class="ic-noInternet">No internet access</span>
            </div> --}}
        </div>

        {{-- Messaging area --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Selecione um chat na lista de mensagens</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <div class="message">
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    {{-- <div class="messenger-infoView app-scroll"> --}}
        {{-- nav actions --}}
        {{-- <nav>
            <p>User Details</p>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!} --}}
    {{-- </div> --}}
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
<footer class="footer footer-transparent d-print-none">
  <div class="container-xl">
    <div class="row text-center align-items-center flex-row-reverse">
      <div class="col-lg-auto ms-lg-auto">
        <ul class="list-inline list-inline-dots mb-0">
          <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Política de Privacidade</a></li>
          <li class="list-inline-item"><a href="./license.html" class="link-secondary">Cookies</a></li>
          <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Termos de Uso</a></li>
        </ul>
      </div>
      <div class="col-12 col-lg-auto mt-3 mt-lg-0">
        <ul class="list-inline list-inline-dots mb-0">
          <li class="list-inline-item">
            Copyright &copy; 2023
            <a href="." class="link-secondary">Fetita</a>.
            Todos os direitos reservados
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>