@extends ('layouts.layout')

@section('content')

<div class="grid grid-flow-col grid-cols-3">
    <div class="block mx-auto">
        <img src="/images/abby.png"
        alt=""
        class="mb-2 mt-6 shadow-2xl"
        width="350px"
        height="450px"
        >
    </div>
    <div class=" justify-left text-justify mt-5 col-span-2 mr-12">
        <p> My name is Jacob and I am an avid lover of Warhammer 40k, both as a hobby and as a game! I decided to build this website as a way to practice coding in PHP
            but also as a way of keeping track of the games and statistics of all the games of Warhammer 40k I play! I hope you also enjoy using this website for tracking your
            own games of Warhammer 40k. For now, this website will only keep track of your games within the 9th edition ruleset but I hope to expand the website to include other
            editions, Kill Team, Necromunda, Age of Sigmar, and other GW game systems. If you have any suggestions feel free to contact me!
        </p>
    </div>

</div>

@endsection
