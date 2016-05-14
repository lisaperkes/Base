@layout('base')

@section('content')

	@wpposts
		@include('templates.title')
	  @include('templates.page')
	@wpempty
	@wpend
  
@endsection
