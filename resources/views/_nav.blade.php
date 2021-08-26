
<!--Nav-->

<nav class="w-full p-2 mt-0 bg-gradient-to-r from-purple-600 via-blue-700 to-indigo-800"> <!-- Add this to make the nav fixed: "fixed z-10 top-0" -->
    <div class="container md:flex lg:flex lg:flex-wrap items-center mx-auto">
        <div class="flex xl:pl-4 lg:pl-4 w-full font-extrabold text-center text-white md:w-1/2">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="/">
                <span class="pl-2 text-2xl"><i></i> Warhammer Score Tracker</span>
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
                    <div x-data="{ dropdownOpen: false }" class="relative mr-3">
                        <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                        focus:outline-none focus:text-white focus:border-pink-700
                        transition duration-150 ease-in-out
                        {{'create' === Route::currentRouteName() || 'createaos' === Route::currentRouteName() ? ' text-white ' : ' text-gray-400 hover:text-white '}}">
                            Record
                        </button>
                        
                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                        
                        <div x-show="dropdownOpen" class="absolute right-0 left-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                            <a href="{{route('create')}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                            Warhammer 40k
                            </a>
                            <a href="{{route('createaos')}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                            Age of Sigmar
                            </a>
                        </div>
                    </div>
                    <div x-data="{ dropdownOpen: false }" class="relative mr-3">
                        <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                        focus:outline-none focus:text-white focus:border-pink-700
                        transition duration-150 ease-in-out
                        {{'index' === Route::currentRouteName() || 'indexaos' === Route::currentRouteName() ? ' text-white ' : ' text-gray-400 hover:text-white '}}">
                            Archive
                        </button>
                        
                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                        
                        <div x-show="dropdownOpen" class="absolute right-0 left-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                            <a href="{{route('index')}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                            Warhammer 40k
                            </a>
                            <a href="{{route('indexaos')}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                            Age of Sigmar
                            </a>
                        </div>
                    </div>
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
                <div x-data="{ dropdownOpen: false }" class="relative mr-3">
                    <button @click="dropdownOpen = !dropdownOpen" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                    focus:outline-none focus:text-white focus:border-pink-700
                    transition duration-150 ease-in-out
                    {{'scorecard' === Route::currentRouteName() ? ' text-white ' : ' text-gray-400 hover:text-white '}}">
                        Score Card
                    </button>
                    
                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                    
                    <div x-show="dropdownOpen" class="absolute right-0 left-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                        <a href="{{route('scorecard')}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                        Warhammer 40k
                        </a>
                        <a href="{{route('scorecardSigmar')}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                        Age of Sigmar
                        </a>
                    </div>
                </div>
                <li class="mr-3">
                    <a href="/register" 
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
                        focus:outline-none focus:text-green-500 focus:border-pink-700
                        transition duration-150 ease-in-out
                        {{'register' === Route::currentRouteName() ? ' text-green-300 ' : ' text-green-400 hover:text-green-200 '}}">
                        Register
                    </a>
                </li>
                <li class="mr-3">
                    <a href="/login" 
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5
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
