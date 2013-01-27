@section('content')
	@if (Session::has('error'))
	<div class="pagination-centered">
		{{ Alert::error(Session::get('error')) }}
	</div>
	@endif
	@if (Session::has('success'))
	<div class="pagination-centered">
		{{ Alert::success(Session::get('success')) }}
	</div>
	@endif

	<div class="hero-unit">
	<h5>To Do:</h5>
		<ul>
			<li>item view</li>
			<li>watchlist model/relations</li>
			<ul>
				<li>id</li>
				<li>name</li>
				<li>user_id</li>
				<li>item_ids</li>
				<li>read_only=true|false</li>
			</ul>
			<li>watchlist view</li>
			<li>pricing hookup to item</li>
			<li>price sampling cron task</li>
			<li>item index view update</li>
		</ul>
	</div>
@endsection
