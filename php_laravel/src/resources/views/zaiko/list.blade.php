@include('components.links')
<link rel="stylesheet" media="all" href="/css/list.css" />

<header class="uk-navbar-container tm-navbar-container uk-sticky-fixed header-back-color uk-animation-fade uk-box-shadow-small">
    @include('components.headers')
</header>
<main uk-grid class="uk-grid-collapse uk-animation-fade">
  <article class="uk-width-expand uk-flex uk-flex-column">
    <section id="searchSection" class="uk-flex-2 padding10-5">
      @include('components.zaiko.list.searchSection')
    </section>
    <section id="listSection" class="uk-flex-1 padding10-5">
      @include('components.zaiko.list.listSection')
    </section>
    <footer class="uk-flex-2 padding10-5 uk-padding-remove-bottom">
      @include('components.zaiko.list.footer')
    </footer>
  </article>
  <aside class="height100 padding10-5" style="display:none;">
    @include('components.zaiko.list.aside')
  </aside>
  <section id="loading">
    <div uk-spinner></div>
  </section>
</main>

@include('components.scripts')

<script type="module" src="/js/zaiko/list/index.js"></script>