@wpposts
	<article {{ post_class() }}>
    <header>
      <h1 class="entry-title">{{ the_title() }}</h1>
      @include('templates.entry-meta')
    </header>
    <div class="entry-content">
      {{ the_content() }}
    </div>
    <footer>
      {{ wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) }}
    </footer>
    {{ comments_template('/templates/comments.blade.php') }}
  </article>
@wpempty
@wpend
