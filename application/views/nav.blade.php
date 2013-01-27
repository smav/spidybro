	 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <a class="brand" href="{{ URL::base() }}">SpidyBro</a>

		 <div class="nav-collapse collapse">
		 	<ul class="nav">
			<li class="divider-vertical"></li>
		 	<li><a href="{{ URL::base().'/watchlist' }}">Watchlists</a></li>

			<li class="divider-vertical"></li>
		 	<li class="dropdown">
		 		<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Items <b class="caret"></b></a>
		 		<ul class="dropdown-menu">
		 		@foreach ($types as $type)
		 			@if (empty($type->subtypes))
		 				<li>
		 					<a tabindex="-1" href="/type/search/{{ $type->id }}">{{ $type->name }}</a>
		 				</li>
		 			@else
		 				<li class="dropdown-submenu">
		 					<a tabindex="-1" href="/type/search/{{ $type->id }}">{{ $type->name }}</a>
		 					<ul class="dropdown-menu">
		 					@foreach ($type->subtypes as $subtype)
		 						<li>
		 							<a tabindex="-1" href="/type/search/{{ $type->id.'/'.$subtype->id }}">{{ $subtype->name }}</a>
		 						</li>
		 					@endforeach
		 					</ul>
		 				</li>
		 			@endif
		 		@endforeach
		 		</ul>
		 	</li>
			<li class="divider-vertical"></li>
			<li>
				<form class="navbar-search" method="POST" action="/item/search">
					<input type="text" class="search-query span2" placeholder="Search" name="term">
				</form>
			</li>
		 	</ul>

            <ul class="nav pull-right">
				<li class="divider-vertical"></li>
              @if ( Auth::guest() )
				<li>
					<a class="js-login" href="{{ URL::to('login')}}"> <i class="icon-user"></i> Login </a>
				</li>
              @else
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-user"></i> {{ Auth::user()->username }} <b class="caret"></b></b></a>
					<ul class="dropdown-menu">
						<li>
							<a tabindex="-1" href="/user/manage">Manage User</a>
						</li>
						<li class="divider"></li>
						<li>
							<a tabindex="-1" href="/logout">Log Out</a>
						</li>
					</ul>
				</li>
              @endif
            </ul>

		 </div><!--/.nav-collapse -->

        </div>
      </div>
    </div>
