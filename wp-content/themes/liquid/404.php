@layout('base')

@section('content')
	
	@include('templates.title')

	<div data-alert class="alert-box warning radius">
		{{ _e('Sorry, but the page you were trying to view does not exist.', 'sage') }}
	</div>
	
	{{ get_search_form() }}
  
@endsection
