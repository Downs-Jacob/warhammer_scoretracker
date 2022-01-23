@extends ('layouts.layout')


@section ('content')

<body class="font-sans leading-normal tracking-normal">
    <div class="container flex flex-col md:flex-row items-center my-10 md:my-24">
		<div class="flex flex-col w-full lg:w-1/2 items-start pb-12 px-6 lg:pl-20">
			<h1 class="font-bold text-3xl my-4 text-center">Warhammer Score Tracker</h1>
		@if (auth()->check())
		
			<p class="leading-normal mb-4">
			This is a website designed for tracking your games of Warhammer 40k 9th edition and Warhammer Age 
			of Sigmar 3rd Edition. To get started click on the 'Record' tab in the navigation bar above and choose between
			Warhammer 40k or Age of Sigmar!</p>
		

		@else
			<p class="leading-normal mb-4">
			This is a website designed for tracking your games of Warhammer 40k 9th edition and Warhammer Age 
			of Sigmar 3rd Edition. To save games you will need to register or login first, however, if you just want to track a single game
			of either Warhammer 40k or Age of Sigmar you can press the 'Score Card' button in the navigation bar </p>

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


