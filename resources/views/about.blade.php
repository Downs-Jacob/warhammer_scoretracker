@extends ('layouts.layout')

@section('content')

<div class="mx-auto max-w-3xl p-6 bg-white"> 
    <div class="px-6 text-3xl mb-12 text-center">
        About the Creator
    </div>
    <div class="mx-auto w-2/3 mb-12 px-4 bg-white">
        <div class="mb-10">
            <img src="/images/abby.png"
            alt=""
            class="text-center"
            width="500px"
            height="450px"
            >
        </div>
        
        <div class="justify-center text-justify mb-12 ">
            <p class="justify-center text-justifym mb-12"> My name is Jacob and I am an avid lover of Warhammer 40k, both as a hobby and as a game! I decided to build this website as a way to practice coding in PHP
                but also as a way of keeping track of the games and statistics of all the games of Warhammer 40k that I play. 
            </p>
            <p class="justify-center text-justify mb-12">
                I hope you also enjoy using this website for tracking your
                own games of Warhammer 40k. For now, this website will only keep track of your games within the 9th edition ruleset but I want to expand the website to include other
                editions, Kill Team, Necromunda, Age of Sigmar, and other GW game systems. If you have any suggestions feel free to contact me!
            </p>
        </div>

    </div>
</div>

<div class="mt-20">
    @include('_footer')
</div>

@endsection

