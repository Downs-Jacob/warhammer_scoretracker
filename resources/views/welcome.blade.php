@extends ('layouts.layout')


@section ('content')
        <!--Left Col-->
<body class="bg-gray-400 font-sans leading-normal tracking-normal">
    <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
		<div class="flex flex-col w-full lg:w-1/2 justify-center items-start pt-12 pb-24 px-6">
			<h1 class="font-bold text-3xl my-4">Warhammer 40k Score Tracker</h1>
			<p class="leading-normal mb-4">This is a website for tracking your games of Warhammer 40k 9th edition. Click 'New Game' in the navigation bar above to start a new game or the button below! </p>
			<a href="/create" class="bg-transparent hover:bg-gray-900 text-gray-900 hover:text-white rounded shadow hover:shadow-lg py-2 px-4 border border-gray-900 hover:border-transparent">Start New Game</a>
		</div>
		<!--Right Col-->
		<div class="w-full lg:w-1/2 lg:py-6 text-center">
			<!--Add your product image here-->
            <img class="fill-current mx-auto column-tout__image" src="https://www.games-workshop.com/resources/touts/2019-01-05/Home/Register_190105_All.png" viewBox="0 0 20 20" alt="" data-gtm-ea="/image/featuredMedia">

        </div>
    </div>
</body>


@endsection
