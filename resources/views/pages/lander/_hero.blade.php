<div
    class="relative flex h-[calc(100vh-64px)] items-center overflow-hidden bg-white dark:bg-gray-800"
>
    <div class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="lg:w-full lg:max-w-2xl">
            <main class="mx-auto">
                <div class="sm:text-center lg:text-left">
                    <h1
                        class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl md:text-6xl"
                    >
                        <span class="block xl:inline">Entdecke die besten</span>
                        <span
                            class="block text-indigo-600 dark:text-indigo-400 xl:inline"
                            >Twitch Clips</span
                        >
                    </h1>
                    <p
                        class="mt-3 text-base text-gray-500 dark:text-gray-300 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-0"
                    >
                        Eine Community für die besten Momente aus dem Craftattack
                        Universum. Teile deine Lieblingsclips oder entdecke neue!
                    </p>
                    <div
                        class="mt-5 space-y-3 sm:mt-8 sm:flex sm:justify-center sm:space-x-3 sm:space-y-0 lg:justify-start"
                    >
                        <div class="rounded-md shadow">
                            <a
                                href="{{ route('clips.index') }}"
                                class="ease-in-out hover:scale-105-out transform duration-300 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white transition hover:bg-indigo-700 md:px-10 md:py-4 md:text-lg"
                            >
                                Clips ansehen
                            </a>
                        </div>
                        @auth
                            @can('member')
                                <div class="rounded-md shadow">
                                    <a
                                        href="{{ route('clips.create') }}"
                                        class="ease-in-out hover:scale-105-out transform duration-300 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-100 px-8 py-3 text-base font-medium text-indigo-700 transition hover:bg-indigo-200 dark:bg-gray-700 dark:text-indigo-300 dark:hover:bg-gray-600 md:px-10 md:py-4 md:text-lg"
                                    >
                                        Clip teilen
                                    </a>
                                </div>
                            @endcan
                        @else
                            <div class="rounded-md shadow">
                                <a
                                    href="{{ route('auth.twitch') }}"
                                    class="ease-in-out hover:scale-105-out transform duration-300 flex w-full items-center justify-center rounded-md border border-transparent bg-purple-100 px-8 py-3 text-base font-medium text-purple-700 transition hover:bg-purple-200 dark:bg-purple-900 dark:text-purple-300 dark:hover:bg-purple-800 md:px-10 md:py-4 md:text-lg"
                                >
                                    <svg
                                        class="-ml-1 mr-2 h-6 w-6 text-purple-600 dark:text-purple-300"
                                        fill="currentColor"
                                        viewBox="0 0 512 512"
                                    >
                                        <title>Twitch Logo</title>
                                        <path
                                            d="M80,32,48,112V416h96v64h64l64-64h80L464,304V32ZM416,288l-64,64H256l-64,64V352H112V80H416Z"
                                        />
                                        <rect x="320" y="143" width="48" height="129" />
                                        <rect x="208" y="143" width="48" height="129" />
                                    </svg>
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
        <img
            class="h-full w-full object-cover"
            src="https://www.minecraft.net/content/dam/minecraftnet/games/minecraft/key-art/MC-Downloadables_Carousel_Pride-2022_800x450.jpg"
            alt="Twitch Livestream Background"
            loading="lazy"
        />
        <div
            class="absolute inset-0 bg-gradient-to-r from-white to-transparent dark:from-gray-800 lg:from-white/70 lg:dark:from-gray-800/70"
        ></div>
        <p
            class="absolute bottom-2 right-2 text-xs text-gray-500"
        >
            Bild von minecraft.net
        </p>
    </div>
</div>