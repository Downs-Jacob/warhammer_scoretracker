@extends ('layouts.layout')


@section ('content')

<body class="font-sans leading-normal tracking-normal">
    <div class="container flex flex-col md:flex-row items-center my-10 md:my-24">
		<div class="flex flex-col w-full lg:w-1/2 items-start pb-12 px-6 lg:pl-20">
			<h1 class="font-bold text-3xl my-4 text-center">Warhammer 40k Score Tracker</h1>
		@if (auth()->check())
			<p class="leading-normal mb-4">
			This is a website for tracking your games of Warhammer 40k 9th edition. 
			Click 'New Game' in the navigation bar above to start a new game or the button below! </p>
		
			<a href="/create" 
				class="text-center w-full flex-1 px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
				Start New Game
			</a>
		@else
			<p class="leading-normal mb-4">
			This is a website for tracking your games of Warhammer 40k 9th edition. 
			To save games you will need to register or login, but if you just want to track a single game
			you can press the button below or click Score Card in the navigation bar </p>
			
			<a href="/scorecard" 
				class="text-center w-full flex-1 px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
				Make a Score Card
			</a>
		@endif
		</div>
		<!--Right Col-->
		<div class="w-full lg:w-1/2 lg:py-6 pb-12 text-center">
		
            <img class="pb-12 fill-current mx-auto column-tout__image" src="https://www.games-workshop.com/resources/touts/2019-01-05/Home/Register_190105_All.png" viewBox="0 0 20 20" alt="" data-gtm-ea="/image/featuredMedia">

        </div>

    </div>

</body>
@include('_footer')

@endsection
