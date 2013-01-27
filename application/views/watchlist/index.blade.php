@section('content')
	@if (Session::has('error'))
	<div class="pagination-centered">
		{{ Alert::error(Session::get('error')) }}
	</div>
	@endif
	@if (Session::has('info'))
	<div class="pagination-centered">
		{{ Alert::info(Session::get('info')) }}
	</div>
	@endif
	@if (Session::has('success'))
	<div class="pagination-centered">
		{{ Alert::success(Session::get('success')) }}
	</div>
	@endif

	<div class="hero-unit">
		@if (! empty($watchlists) )
			@foreach ($watchlists as $watchlist)
			@endforeach
		@else
			<p>Please create a new watchlist (either empty or from a template).</p>
		@endif

		<div class="pagination-centered">
			{{ Form::open('/watchlist/add', 'POST', array('class' => 'form-inline')) }}
			{{ Form::text('name', '', array('class' => 'input-small', 'placeholder' => 'name')) }}
			{{ Form::select('template', $templates, 'none', array('class' => '')) }}
			{{ Form::submit('New List', array('class' => 'btn')) }}
			{{ Form::close() }}
		</div>
	</div>
@endsection
