@section('content')
<div class="span5 offset3 well">
		<p><strong>Please fill out the below to register</strong></p>
        <!-- check for login errors flash var -->
			@if (Session::has('errors'))
				@if ($msgs = Session::get('errors')->get('username'))
				<?PHP
					//$msgs = Session::get('errors')->get('username');
					$message = "<ul>";
					foreach ($msgs as $msg)
					{
						$message .= '<li>'.$msg.'</li>';

					}
					$message .= "</ul>";
				?>
					{{ Alert::error($message) }}
				@endif
				@if ($msgs = Session::get('errors')->get('password'))
				<?PHP
					//$msgs = Session::get('errors')->get('password');
					$message = "<ul>";
					foreach ($msgs as $msg)
					{
						$message .= '<li>'.$msg.'</li>';

					}
					$message .= "</ul>";
				?>
					{{ Alert::error($message) }}
				@endif
				@if ($msgs = Session::get('errors')->get('email'))
				<?PHP
					//$msgs = Session::get('errors')->get('email');
					$message = "<ul>";
					foreach ($msgs as $msg)
					{
						$message .= '<li>'.$msg.'</li>';

					}
					$message .= "</ul>";
				?>
					{{ Alert::error($message) }}
				@endif
			@endif
    {{ Form::open('register') }}
        <!-- username field -->
        <p>{{ Form::label('username', 'Username') }}</p>
        <p>{{ Form::text('username') }}</p>
        <!-- password field -->
        <p>{{ Form::label('password', 'Password') }}</p>
        <p>{{ Form::password('password') }}</p>
        <!-- email field -->
        <p>{{ Form::label('email', 'Email') }}</p>
		<p "muted"><small>(optional)</small></p>
        <p>{{ Form::text('email') }}</p>
        <!-- submit button -->
        <p>{{ Form::submit('Register', array('class' => 'btn-large')) }}</p>
    {{ Form::close() }}
</div>
@endsection
