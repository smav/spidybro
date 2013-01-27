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
		<table id="datatable" class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th></th>
					<th>Name</th>
					<th>Rarity</th>
					<th>Level</th>
					<th>Price</th>
					<th>Available</th>
					<th>B/E</th>
					<th>Margin</th>
					<th>Q</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($items as $item)
				<tr>
					<td data-tooltip-href="{{ $item->gw2db_link }}">
						<a href="/item/view/{{ $item->data_id }}">
							<img src="{{ $item->img }}" />
						</a>
					</td>
					<td data-tooltip-href="{{ $item->gw2db_link }}">
						<a href="/item/view/{{ $item->data_id }}">
							{{ $item->name }}
						</a>
					</td>
					<td>{{ $item->rarityname }}</td>
					<td>{{ $item->restriction_level }}</td>
					@if ( true )
						<td class="text-success">0.01.23</td>
					@endif
					<td>9,345</td>
					<td>{{ 0 }}</td>
					@if ( true )
						<td class="text-error">Margin</td>
					@endif
					<td>Q</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
