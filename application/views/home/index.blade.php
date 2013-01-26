@section('content')
    @if (Session::has('success_message'))
 	<div class="span8">
        {{ Alert::success("Success! Post deleted!") }}
	</div>
    @endif
@endsection

@section('pagination')
    	<div class="row-fluid">
    		<div class="span8">
	   		 </div>
		</div>
@endsection
