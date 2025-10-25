<div class="relative overflow-hidden bg-white dark:bg-gray-800 h-[calc(100vh-64px)] flex items-center">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="lg:w-full lg:max-w-2xl">
            <main class="mx-auto">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Entdecke die besten</span>
                        <span class="block text-indigo-600 dark:text-indigo-400 xl:inline">Twitch Clips</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 dark:text-gray-300 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-0">
                        Eine Community für die besten Momente aus dem Craftattack Universum. Teile deine Lieblingsclips oder entdecke neue!
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start space-y-3 sm:space-y-0 sm:space-x-3">
                        <div class="rounded-md shadow">
                            <a href="{{ route('clips.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:px-10 md:text-lg transition duration-300 ease-in-out transform hover:scale-105">
                                Clips ansehen
                            </a>
                        </div>
                        @auth
                            @can('member')
                                <div class="rounded-md shadow">
                                    <a href="{{ route('clips.create') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:px-10 md:text-lg dark:bg-gray-700 dark:text-indigo-300 dark:hover:bg-gray-600 transition duration-300 ease-in-out transform hover:scale-105">
                                        Clip teilen
                                    </a>
                                </div>
                            @endcan
                        @else
                            <div class="rounded-md shadow">
                                <a href="{{ route('auth.twitch') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-purple-700 bg-purple-100 hover:bg-purple-200 md:py-4 md:px-10 md:text-lg dark:bg-purple-900 dark:text-purple-300 dark:hover:bg-purple-800 transition duration-300 ease-in-out transform hover:scale-105">
                                    <svg class="h-6 w-6 mr-2 -ml-1 text-purple-600 dark:text-purple-300" fill="currentColor" viewBox="0 0 512 512"><title>Twitch Logo</title><path d="M80,32,48,112V416h96v64h64l64-64h80L464,304V32ZM416,288l-64,64H256l-64,64V352H112V80H416Z"/><rect x="320" y="143" width="48" height="129"/><rect x="208" y="143" width="48" height="129"/></svg>
                                    Login mit Twitch
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="absolute inset-y-0 right-0 w-full lg:w-1/2">
        {{--<img class="h-full w-full object-cover" src="https://www.minecraft.net/content/dam/minecraftnet/games/minecraft/key-art/Minecraft_Fall_Drop_Campaign_Key_Art_DotNet_Downloadable_Wallpaper_414x414.png" alt="Twitch Livestream Background" loading="lazy">--}}
        <img class="h-full w-full object-cover" src="https://www.minecraft.net/content/dam/minecraftnet/games/minecraft/key-art/MC-Downloadables_Carousel_Pride-2022_800x450.jpg" alt="Twitch Livestream Background" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-white dark:from-gray-800 to-transparent lg:from-white/70 lg:dark:from-gray-800/70"></div>
    </div>
</div>