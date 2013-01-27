@section('content')
	@if (Session::has('error'))
		{{ Alert::error(Session::get('error')) }}
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
					<th>B/E</th>
					<th>Margin</th>
					<th>Q</th>
					<th>Available</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($items as $item)
				@if ($item->restriction_level > 70)
				<tr class="success">
				@else
				<tr class="error">
				@endif
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
					<td>{{ $item->rarity }}</td>
					<td>{{ $item->restriction_level }}</td>
					@if ( true )
						<td class="text-success">0.01.23</td>
					@endif
					<td>{{ 0 }}</td>
					@if ( true )
						<td class="text-error">Margin</td>
					@endif
					<td>Q</td>
					<td>Available</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
