@section('content')
<div class="span5 offset3 well">
        @if (Session::has('successmsg'))
            {{ Alert::success(Session::get('successmsg')) }}
        @endif
        <!-- check for login errors flash var -->
        @if (Session::has('login_errors'))
            {{ Alert::error("Username or password incorrect.") }}
        @endif
<div class="offset2">
    {{ Form::open('login') }}
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
