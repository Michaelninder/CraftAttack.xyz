<section class="py-16 bg-gray-100 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white text-center mb-12">
            Unsere Teilnehmer
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8">
            @foreach ($participants as $participant)
                <div class="flex flex-col items-center text-center">
                    <div class="relative w-24 h-24 mb-4 rounded-full overflow-hidden border-4 border-indigo-500">
                        <img
                            src="{{ $participant->pfp_path ?? 'https://via.placeholder.com/150' }}"
                            alt="{{ $participant->name }}"
                            class="absolute inset-0 w-full h-full object-cover"
                        >
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">
                        {{ $participant->name }}
                    </h3>
                    <div class="flex space-x-2 mt-2">
                        @if ($participant->youtube_url)
                            <a
                                href="{{ $participant->youtube_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-red-500 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200"
                                title="YouTube"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    class="w-5 h-5"
                                >
                                    <title>YouTube Logo</title>
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M20.5949 4.45999C21.5421 4.71353 22.2865 5.45785 22.54 6.40501C22.9982 8.12001 23 11.7004 23 11.7004C23 11.7004 23 15.2807 22.54 16.9957C22.2865 17.9429 21.5421 18.6872 20.5949 18.9407C18.88 19.4007 12 19.4007 12 19.4007C12 19.4007 5.12001 19.4007 3.405 18.9407C2.45785 18.6872 1.71353 17.9429 1.45999 16.9957C1 15.2807 1 11.7004 1 11.7004C1 11.7004 1 8.12001 1.45999 6.40501C1.71353 5.45785 2.45785 4.71353 3.405 4.45999C5.12001 4 12 4 12 4C12 4 18.88 4 20.5949 4.45999ZM15.5134 11.7007L9.79788 15.0003V8.40101L15.5134 11.7007Z"
                                    />
                                </svg>
                            </a>
                        @endif
                        @if ($participant->twitch_url)
                            <a
                                href="{{ $participant->twitch_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-purple-600 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200"
                                title="Twitch"
                            >
                                <svg
                                    class="w-5 h-5"
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
                            </a>
                        @endif
                        @if ($participant->instagram_url ?? false)
                            <a
                                href="{{ $participant->instagram_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-pink-500 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-colors duration-200"
                                title="Instagram"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M7.5 0h9a7.5 7.5 0 0 1 7.5 7.5v9a7.5 7.5 0 0 1-7.5 7.5h-9A7.5 7.5 0 0 1 0 16.5v-9A7.5 7.5 0 0 1 7.5 0zm.5 2a5.5 5.5 0 0 0-5.5 5.5v9a5.5 5.5 0 0 0 5.5 5.5h9a5.5 5.5 0 0 0 5.5-5.5v-9a5.5 5.5 0 0 0-5.5-5.5h-9zM12 6a6 6 0 1 0 0 12 6 6 0 0 0 0-12zm0 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm5-2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                                    />
                                </svg>
                            </a>
                        @endif
                    </div>
                    @if ($participant->is_new)
                        <span class="mt-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                            Neu dabei
                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>