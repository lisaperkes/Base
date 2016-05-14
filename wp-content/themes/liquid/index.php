@layout('base')

@section('content')

	@include('templates.title')

	@wpposts
	  @include('templates.content')
	@wpempty
		<div data-alert class="alert-box warning radius">
	  	{{ _e('Sorry, no results were found.', 'sage') }}
	  </div>
	  {{ get_search_form() }}
	@wpend
	
	@if ($wp_query->max_num_pages > 1)
		{{ LiquidPagination() }}
	@endif
  
@endsection
