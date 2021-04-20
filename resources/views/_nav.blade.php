
<!--Nav-->

<nav class="w-full p-2 mt-0 bg-gradient-to-r from-purple-600 via-blue-700 to-indigo-800"> <!-- Add this to make the nav fixed: "fixed z-10 top-0" -->
    <div class="container flex flex-wrap items-center mx-auto">
        <div class="flex justify-center w-full font-extrabold text-center text-white md:w-1/2">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="/">
                <span class="pl-2 text-2xl"><i></i> Warhammer 40k 9th Edition Score Tracker</span>
            </a>
        </div>
        <div class="flex content-center justify-between w-full pt-2 md:w-1/2 md:justify-end">
            <ul class="flex items-center justify-between flex-1 list-reset md:flex-none">
                <li class="mr-3 ">
                    <a href="{{route('splash')}}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                        focus:outline-none focus:text-white focus:border-pink-700
                        transition duration-150 ease-in-out
                        {{'splash' === Route::currentRouteName() ? ' text-white ' : ' text-gray-400 hover:text-white '}}">
                    Home
                    </a>
                </li>
                @if (auth()->check())
                <li class="mr-3">
                    <a href="{{route('create')}}" 
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                        focus:outline-none focus:text-white focus:border-pink-700
                        transition duration-150 ease-in-out
                        {{'create' === Route::currentRouteName() ? ' text-white ' : ' text-gray-400 hover:text-white '}}">
                    Record Game
                    </a>
                 </li>
                <li class="mr-3">
                    <a href="{{route('archive')}}" 
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                        focus:outline-none focus:text-white focus:border-pink-700
                        transition duration-150 ease-in-out
                        {{'archive' === Route::currentRouteName() ? ' text-white ' : ' text-gray-400 hover:text-white '}}">
                    Archive
                    </a>
                </li>
                <li class="mr-3">
                    <a href="{{route('statistics')}}" 
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                        focus:outline-none focus:text-white focus:border-pink-700
                        transition duration-150 ease-in-out
                        {{'statistics' === Route::currentRouteName() ? ' text-white ' : ' text-gray-400 hover:text-white '}}">
                    Statistics
                    </a>
                </li>
               

                @else
                <li class="mr-3">
                    <a href="{{route('scorecard')}}" 
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                        focus:outline-none focus:text-white focus:border-pink-700
                        transition duration-150 ease-in-out
                        {{'scorecard' === Route::currentRouteName() ? ' text-white ' : ' text-gray-400 hover:text-white '}}">
                    Score Card
                    </a>
                </li>
                <li class="mr-3">
                    <a href="/register" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                    focus:outline-none focus:text-green-500 focus:border-pink-700
                    transition duration-150 ease-in-out
                    {{'register' === Route::currentRouteName() ? ' text-green-300 ' : ' text-green-400 hover:text-green-200 '}}">
                        Register
                    </a>
                </li>
                <li class="mr-3">
                    <a href="/login" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                    focus:outline-none focus:text-green-500 focus:border-pink-700
                    transition duration-150 ease-in-out
                    {{'login' === Route::currentRouteName() ? ' text-green-300 ' : ' text-green-400 hover:text-green-200 '}}">
                        Login
                    </a>
                </li>

                @endif

                @if (auth()->check())
                    <form method="POST" action='/logout'>
                        @csrf
                        <button class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-red-500 hover:text-red-300 ">Logout</button>
                    </form>
                @else
                @endif

            </ul>
        </div>
    </div>
</nav>
