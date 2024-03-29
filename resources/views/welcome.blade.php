@extends ('layouts.layout')


@section ('content')

<body class="font-sans leading-normal tracking-normal">
    <div class="bg-stone-300 px-24 lg:flex">
		<div class="lg:flex flex-col w-full lg:w-1/2 items-start pb-12 px-6 lg:pl-20 lg:mt-24">
			<h1 class="font-bold text-3xl text-center">Track Your Games of Warhammer 40k of Age of Sigmar</h1>
		<!--Left Col-->
		@if (auth()->check())
		
			<p class="leading-normal">
			If you would like to log a new game of Warhammer 40k click on the 'Record' tab in the navigation bar 
			above and choose Warhammer 40k from drop down menu. If you would like to see games you have previously recorded, click on the 'Archive'
			tab in the navigation bar and choose Warhammer 40k from the dropdown menu. 		
			</p>
		

		@else
			<p class="leading-normal">
			This is a website designed for tracking your games of Warhammer 40k and Age of Sigmar. Currently only 9th and 10th edition for 40k are supported and 3rd edition
			for Age of Sigmar is supported. To save games you will need to register or login first, however, if 
			you just want to track a single game of Warhammer 40k or Age of Sigmar you can press the 'Score Card' button in the navigation bar and select either Warhammer 40k or Age of Sigmar from 
			the dropdown menu.
		</p>
		@endif

		</div>
		<!--Right Col-->
		<div class="mt-5 mr-12 w-full lg:w-1/2 lg:py-6 pb-12 text-center">
		<img class="pb-12 fill-current mx-auto column-tout__image" 
			src="/images/aquilla.png"
            alt=""
            class="text-center"
            width="500px"
            height="450px"
            >
        </div>
    </div>
		<!--Left Col-->
	<div class="bg-violet-300 px-24 lg:flex">
		<div class="w-full lg:w-1/2 lg:py-6 lg:pb-12 text-center">
			
			<img class="lg:pb-12 fill-current mx-auto column-tout__image" 
			src="/images/chaos.png"
            alt=""
            class="text-center"
            width="500px"
            height="450px"
            >

		</div>
		<!--Right Col-->
		
		<div class="mt-4 lg:mt-24 flex flex-col w-full lg:w-1/2 items-start pb-12 px-6 lg:pl-20">
			<h1 class="font-bold text-3xl my-4 text-center">Save Your Games of Warhammer 40k or Age of Sigmar</h1>

		@if (auth()->check())
		
			<p class="leading-normal">
			You can also store your games of Warhammer 40k and Age of Sigmar now that you are logged in! Once you save a game it will be placed in the archive, 
			where you can review, edit, or delete the record. You can also view your statistics including win percentage, army use breakdown, and other 
			stats by clicking the statistics menu. 
		
			</p>
		

		@else
			<p class="leading-normal">
			This website can also help you store your games of Warhammer 40k and Age of Sigmar. If you are logged in, you can save your games into an archive, 
			allowing you the ability to review your games in the future. You can also view your statistics including win percentage, army use breakdown, and other 
			statistics.
		</p>
		@endif

		</div>
    </div>
</body>
@include('_footer')
@endsection


