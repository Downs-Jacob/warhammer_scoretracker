<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warhammer 40k Score Tracker</title>
	<meta name="author" content="name">
    <meta name="description" content="description here">
	<meta name="keywords" content="keywords,here">
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->

</head>

        @include ('_nav')

<body class="m-0">
	<!--Container-->
        <div class="bg-grey-100 container-fluid w-full bottom-0">
            <div class="bg-grey-100 bottom-0">
                @yield ('content')
            </div>
        </div>
</body>
</html>
