<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter Template - Hero Product : Tailwind Toolbox</title>
	<meta name="author" content="name">
    <meta name="description" content="description here">
	<meta name="keywords" content="keywords,here">
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
	<link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> <!--Replace with your tailwind.css once created-->
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->

</head>


	<!--Nav-->
	<nav class="w-full p-2 mt-0 bg-gray-800"> <!-- Add this to make the nav fixed: "fixed z-10 top-0" -->
        <div class="container flex flex-wrap items-center mx-auto">
		    <div class="flex justify-center w-full font-extrabold text-white md:w-1/2 md:justify-start">
				<a class="text-white no-underline hover:text-white hover:no-underline" href="/">
					<span class="pl-2 text-2xl"><i></i> Warhammer 40k 9th Edition Game Tracker</span>
				</a>
            </div>
			<div class="flex content-center justify-between w-full pt-2 md:w-1/2 md:justify-end">
				<ul class="flex items-center justify-between flex-1 list-reset md:flex-none">
				  <li class="mr-3 ">
					<a href="{{route('welcome')}}" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 focus:outline-none focus:text-white focus:border-pink-700 transition duration-150 ease-in-out {{'welcome' === Route::currentRouteName() ? ' text-white ' : ' text-gray-600 hover:text-white '}}">
                        Home
                        </a>
				  </li>
				  <li class="mr-3">
					<a href="{{route('create')}}" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 focus:outline-none focus:text-white focus:border-pink-700 transition duration-150 ease-in-out {{'create' === Route::currentRouteName() ? ' text-white ' : ' text-gray-600 hover:text-white '}}">
                        Create
                        </a>
				  </li>
				  <li class="mr-3">
					<a href="{{route('archive')}}" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 focus:outline-none focus:text-white focus:border-pink-700 transition duration-150 ease-in-out {{'archive' === Route::currentRouteName() ? ' text-white ' : ' text-gray-600 hover:text-white '}}">
                        Archive
				  </li>
					<li class="mr-3">
					<a class="inline-block px-4 py-2 text-gray-600 no-underline hover:text-gray-200 hover:text-underline" href="/stats">Statistics</a>
				  </li>
				</ul>
			</div>
        </div>
    </nav>

        @yield ('header')

	<!--Container-->
	<div class="h-screen bg-white">
        <div class="container px-6 pt-24 mx-auto md:pt-16">
            @yield ('content')
        </div>
	</div>


</body>
</html>
