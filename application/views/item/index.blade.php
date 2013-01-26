
@section('content')
    @if (Session::has('success_message'))
 	<div class="span8">
        {{ Alert::success("Success! Post deleted!") }}
	</div>
    @endif

	<div class="hero-unit">
		<table id="datatable" class="table table-hover table-striped">
			<thead>
<tr>
<td></td>
<td>Name</td>
<td>Rarity</td>
<td>Level</td>
<td>Price</td>
<td>Margin</td>
<td>Q</td>
<td>Available</td>
<td>gw2dbid</td>
</tr>
			</thead>
			<tbody>
@foreach ($items as $item)
@if ($item->restriction_level > 70)
<tr class="success" data-tooltip-href="{{ $item->gw2db_link }}">
@else
<tr class="error" data-tooltip-href="{{ $item->gw2db_link }}">
@endif
<td>
<a href="/item/{{ $item->data_id }}">
<img src="{{ $item->img }}" />
</a>
</td>
<td>{{ $item->name }}</td>
<td>{{ $item->rarity }}</td>
<td>{{ $item->restriction_level }}</td>
<td>Price</td>
<td>Margin</td>
<td>Q</td>
<td>Available</td>
<td>{{ $item->gw2db_external_id }}</td>
</tr>
@endforeach
			</tbody>
		</table>
	</div>

@endsection

@section('pagination')
@endsection

