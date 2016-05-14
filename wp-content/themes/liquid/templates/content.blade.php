<article {{ post_class() }}>
  <header>
    <h2 class="entry-title"><a href="{{ the_permalink() }}">{{ the_title() }}</a></h2>
    @include('templates.entry-meta')
  </header>
  <div class="entry-summary">
    {{ the_excerpt() }}
  </div>
</article>
