<!doctype html>
<html {{ language_attributes() }}>
  @include('templates.head')
  <body {{ body_class() }}>
    <!--[if IE]>
    <div class="primary callout">
      {{{ _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage') }}}
    </div>
    <![endif]-->
    {{ do_action('get_header') }}
    @include('templates.header')
    <main class="main" role="main">
      @yield('content')
    </main>
    {{ do_action('get_footer') }}
    @include('templates.footer')
    {{ wp_footer() }}
  </body>
</html>
