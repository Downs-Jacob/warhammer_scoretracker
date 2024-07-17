<div id="footer" class="bg-slate-800 container-fluid w-full pt-10 bottom-0 text-xs text-left pl-6 pb-10 lg:px-10 lg:text-base">
    <div
    class="text-white mt-6 flex"
    x-data="{ open: false }"
    x-show=true>
    2021 JCQ Production
    <a
        href="/faq"
        class="px-2 text-xs text-blue-400 hover:text-blue-300 lg:text-base"> faq
    </a>
    |
    <a
        href="/about"
        class="px-2 text-xs text-blue-400 hover:text-blue-300 lg:text-base"> about
    </a>
    |
    <a
        href="/contact"
        class="px-2 text-xs text-blue-400 hover:text-blue-300 lg:text-base"> contact
    </a>
    |
    <button
        class="px-2 text-xs text-blue-400 hover:text-blue-300 lg:text-base"
        @click="open = true"> updates
    </button>

    <!-- Dialog (full screen) -->
    <div
        class="fixed bottom-0 left-0 flex items-center justify-center w-full h-full"
        style="background-color: rgba(0,0,0,.5);"
        x-show="open">
        <div
            class="h-auto p-4 mx-2 text-center bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
            @click.away="open = false">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg text-center font-medium font-bold leading-6 text-gray-900"> Recent Updates </h3>
                <h2 class="text-lg text-center font-small leading-6 pb-3 text-gray-900"> July 2024 </h2>
                <div class="mt-2">
                    <p class="text-left text-justify text-sm leading-5 text-gray-500 pb-2"> - Add Pariah Nexus Update</p>
                    <p class="text-left text-justify text-sm leading-5 text-gray-500 pb-2"> - Add Age of Sigmar 4.0 Update</p>

                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <span class="flex w-full rounded-md shadow-sm">
                    <button @click="open = false"
                        class="shadow-xl flex-1 px-3 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
                        Return
                    </button> 
                </span>
            </div>
        </div>
    </div>
 </div>
</div>


 