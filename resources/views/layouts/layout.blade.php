<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Warhammmer 40k Score Tracker</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Raleway:400,200,500,600,700,800,300" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<div id="wrapper">
	<div id="menu-wrapper">
		<div id="menu" class="container">
			<ul>
				<li class="{{Request::path() === '/' ? 'current_page_item' : ''}}"><a href="/" accesskey="1" title="">Homepage</a></li>
				<li class="{{Request::path() === 'create' ? 'current_page_item' : ''}}"><a href="/create" accesskey="2" title="">New Game</a></li>
				<li><a href="#">Archive</a></li>
				<li><a href="#">Statistics</a></li>
			</ul>
		</div>
		<!-- end #menu -->

    </div>
    @yield ('header')

	</div>
</div>


</head>
<body>
    @yield ('content')
</body>
</html>
