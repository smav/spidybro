@section('content')
<div class="span5 offset3 well">
	@if (Session::has('error'))
		{{ Alert::error(Session::get('error')) }}
	@endif
	@if (Session::has('info'))
		{{ Alert::info(Session::get('info')) }}
	@endif
	@if (Session::has('success'))
		{{ Alert::success(Session::get('success')) }}
	@endif
	<!-- check for login errors flash var -->
	@if (Session::has('login_errors'))
		{{ Alert::error("Username or password incorrect.") }}
	@endif

	{{ Form::open('login', 'POST', array('class' => 'form-horizontal')) }}
	<!-- username field -->
	<p>{{ Form::label('username', 'Username') }}</p>
	<p>{{ Form::text('username') }}</p>
	<!-- password field -->
	<p>{{ Form::label('password', 'Password') }}</p>
	<p>{{ Form::password('password') }}</p>
	<!-- submit button -->
	<p>{{ Form::submit('Login', array('class' => 'btn-large')) }}</p>
	{{ Form::close() }}
	<p><a href="/user/register">Need to Register?</a></p>
</div>
@endsection
