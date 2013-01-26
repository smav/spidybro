<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SpidyBro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    {{ Asset::container('bootstrapper')->styles(); }}
	<link href="/css/data-tables.css" media="all" type="text/css" rel="stylesheet">
	<link href="/css/data-tables-bs.css" media="all" type="text/css" rel="stylesheet">
	<link href="/css/site.css" media="all" type="text/css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    {{ Asset::container('bootstrapper')->scripts(); }}
	<script type="text/javascript" src="http://static-ascalon.cursecdn.com/current/js/syndication/tt.js"></script>
	<script type="text/javascript" src="/js/data-tables.js"></script>
	<script type="text/javascript" src="/js/data-tables-bs.js"></script>
</head>
<body>
	@include('nav')
    <div class="container-fluid">
          <div class="row-fluid">
          @yield('content')
          </div>
          @yield('pagination')
    </div>

    <div class="container-fluid">
        <footer>
<!--            <p>TehMavInc &copy; 2012</p>-->
        </footer>
    </div>
</body>
</html>
