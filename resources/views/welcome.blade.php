@extends ('layouts.layout')


@section ('content')
        <!--Left Col-->

<body class="font-sans leading-normal tracking-normal">
    <div class="container flex flex-col md:flex-row items-center my-10 md:my-24">
		<div class="flex flex-col w-full lg:w-1/2 items-start pb-48 px-6">
			<h1 class="font-bold text-3xl my-4">Warhammer 40k Score Tracker</h1>
			<p class="leading-normal mb-4">This is a website for tracking your games of Warhammer 40k 9th edition. Click 'New Game' in the navigation bar above to start a new game or the button below! </p>
			<a href="/create" class="bg-transparent hover:bg-blue-400 text-gray-700 hover:text-white rounded shadow hover:shadow-lg py-2 px-4 border border-gray-100 hover:border-transparent">Start New Game</a>
		</div>
		<!--Right Col-->
		<div class="w-full lg:w-1/2 lg:py-6 pb-48 text-center">
			<!--Add your product image here-->
            <img class="pb-48 fill-current mx-auto column-tout__image" src="https://www.games-workshop.com/resources/touts/2019-01-05/Home/Register_190105_All.png" viewBox="0 0 20 20" alt="" data-gtm-ea="/image/featuredMedia">

        </div>

    </div>

</body>
@include('_footer')

@endsection
