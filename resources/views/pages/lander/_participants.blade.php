<section class="py-16 bg-gray-100 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white text-center mb-4">Teilnehmer</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 text-center mb-8">Wir können nur den Live-Status von Twitch-Streamern überprüfen</p>

        <div class="mb-8 flex justify-center">
            <input type="text" id="participant-search" onkeyup="filterAndSearchParticipants()" placeholder="Teilnehmer suchen..."
                   class="px-4 py-2 w-full max-w-md border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">
        </div>

        <div class="flex flex-wrap justify-center space-x-2 sm:space-x-4 mb-12">
            <button onclick="filterParticipants('all')" class="filter-btn px-6 py-2 text-sm font-medium rounded-lg transition-colors duration-200 bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-filter="all">Alle</button>
            <button onclick="filterParticipants('live')" class="filter-btn px-6 py-2 text-sm font-medium rounded-lg transition-colors duration-200 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-filter="live">Live</button>
            <button onclick="filterParticipants('new')" class="filter-btn px-6 py-2 text-sm font-medium rounded-lg transition-colors duration-200 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-filter="new">Neu</button>
            <button onclick="filterParticipants('youtube')" class="filter-btn px-6 py-2 text-sm font-medium rounded-lg transition-colors duration-200 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" data-filter="youtube">YouTube</button>
            <button onclick="filterParticipants('twitch')" class="filter-btn px-6 py-2 text-sm font-medium rounded-lg transition-colors duration-200 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" data-filter="twitch">Twitch</button>
            <!--button onclick="filterParticipants('instagram')" class="filter-btn px-6 py-2 text-sm font-medium rounded-lg transition-colors duration-200 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500" data-filter="instagram">Instagram</button-->
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8" id="participants-grid">
            @foreach ($participants as $participant)
                <div class="participant-card flex flex-col items-center text-center"
                     data-is-live="{{ $participant->getLiveState() ? 'true' : 'false' }}"
                     data-is-new="{{ $participant->is_new ? 'true' : 'false' }}"
                     data-has-youtube="{{ $participant->youtube_url ? 'true' : 'false' }}"
                     data-has-twitch="{{ $participant->twitch_url ? 'true' : 'false' }}"
                     data-has-instagram="{{ ($participant->instagram_url ?? false) ? 'true' : 'false' }}"
                     data-name="{{ strtolower($participant->name) }}">
                    <div class="relative w-24 h-24 mb-4">
                        <div class="rounded-full overflow-hidden border-4 border-indigo-500 w-full h-full">
                            <img src="{{ $participant->getPfp() }}" alt="{{ $participant->name }}" class="absolute inset-0 w-full h-full object-cover rounded-xl">
                        </div>
                        @if ($participant->is_new)
                            <span class="absolute -top-2 -right-2 px-2 py-1 text-xs font-bold text-white bg-yellow-500 rounded-full dark:bg-yellow-400 z-20">Neu</span>
                        @endif
                        @if ($participant->getLiveState())
                            <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 px-3 py-1 text-xs font-bold text-white bg-red-600 rounded-full flex items-center gap-1 z-20 animate-pulse">
                                <span class="w-2 h-2 bg-white rounded-full"></span>Live
                            </span>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">{{ $participant->name }}</h3>
                    <div class="flex space-x-2 mt-2">
                        @if ($participant->youtube_url)
                            <a href="{{ $participant->youtube_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-red-500 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200" title="YouTube">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><title>YouTube Logo</title><path fill-rule="evenodd" clip-rule="evenodd" d="M20.5949 4.45999C21.5421 4.71353 22.2865 5.45785 22.54 6.40501C22.9982 8.12001 23 11.7004 23 11.7004C23 11.7004 23 15.2807 22.54 16.9957C22.2865 17.9429 21.5421 18.6872 20.5949 18.9407C18.88 19.4007 12 19.4007 12 19.4007C12 19.4007 5.12001 19.4007 3.405 18.9407C2.45785 18.6872 1.71353 17.9429 1.45999 16.9957C1 15.2807 1 11.7004 1 11.7004C1 11.7004 1 8.12001 1.45999 6.40501C1.71353 5.45785 2.45785 4.71353 3.405 4.45999C5.12001 4 12 4 12 4C12 4 18.88 4 20.5949 4.45999ZM15.5134 11.7007L9.79788 15.0003V8.40101L15.5134 11.7007Z"/></svg>
                            </a>
                        @endif
                        @if ($participant->twitch_url)
                            <a href="{{ $participant->twitch_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-purple-600 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200" title="Twitch">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512"><title>Twitch Logo</title><path d="M80,32,48,112V416h96v64h64l64-64h80L464,304V32ZM416,288l-64,64H256l-64,64V352H112V80H416Z"/><rect x="320" y="143" width="48" height="129"/><rect x="208" y="143" width="48" height="129"/></svg>
                            </a>
                        @endif
                        @if ($participant->instagram_url ?? false)
                            <a href="{{ $participant->instagram_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-pink-500 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-colors duration-200" title="Instagram">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M7.5 0h9a7.5 7.5 0 0 1 7.5 7.5v9a7.5 7.5 0 0 1-7.5 7.5h-9A7.5 7.5 0 0 1 0 16.5v-9A7.5 7.5 0 0 1 7.5 0zm.5 2a5.5 5.5 0 0 0-5.5 5.5v9a5.5 5.5 0 0 0 5.5 5.5h9a5.5 5.5 0 0 0 5.5-5.5v-9a5.5 5.5 0 0 0-5.5-5.5h-9zM12 6a6 6 0 1 0 0 12 6 6 0 0 0 0-12zm0 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm5-2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    let currentFilter = 'all';

    function filterAndSearchParticipants() {
        const searchValue = document.getElementById('participant-search').value.toLowerCase();
        const cards = document.querySelectorAll('.participant-card');

        cards.forEach(card => {
            const isLive = card.dataset.isLive === 'true';
            const isNew = card.dataset.isNew === 'true';
            const hasYoutube = card.dataset.hasYoutube === 'true';
            const hasTwitch = card.dataset.hasTwitch === 'true';
            const hasInstagram = card.dataset.hasInstagram === 'true';
            const participantName = card.dataset.name;

            let matchesFilter = false;
            if (currentFilter === 'all') {
                matchesFilter = true;
            } else if (currentFilter === 'live') {
                matchesFilter = isLive;
            } else if (currentFilter === 'new') {
                matchesFilter = isNew;
            } else if (currentFilter === 'youtube') {
                matchesFilter = hasYoutube;
            } else if (currentFilter === 'twitch') {
                matchesFilter = hasTwitch;
            } else if (currentFilter === 'instagram') {
                matchesFilter = hasInstagram;
            }

            const matchesSearch = participantName.includes(searchValue);

            if (matchesFilter && matchesSearch) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function filterParticipants(filter) {
        currentFilter = filter;
        const buttons = document.querySelectorAll('.filter-btn');

        buttons.forEach(btn => {
            if (btn.dataset.filter === filter) {
                btn.classList.remove('bg-white', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-200', 'hover:bg-gray-50', 'dark:hover:bg-gray-600');
                btn.classList.add('bg-indigo-600', 'text-white', 'hover:bg-indigo-700');
            } else {
                btn.classList.remove('bg-indigo-600', 'text-white', 'hover:bg-indigo-700');
                btn.classList.add('bg-white', 'dark:bg-gray-700', 'text-gray-700', 'dark:text-gray-200', 'hover:bg-gray-50', 'dark:hover:bg-gray-600');
            }
            if (btn.dataset.filter === 'youtube' && filter !== 'youtube') {
                btn.classList.add('text-red-500');
                btn.classList.remove('focus:ring-indigo-500');
                btn.classList.add('focus:ring-red-500');
            } else if (btn.dataset.filter === 'twitch' && filter !== 'twitch') {
                btn.classList.add('text-purple-600');
                btn.classList.remove('focus:ring-indigo-500');
                btn.classList.add('focus:ring-purple-500');
            } else if (btn.dataset.filter === 'instagram' && filter !== 'instagram') {
                btn.classList.add('text-pink-500');
                btn.classList.remove('focus:ring-indigo-500');
                btn.classList.add('focus:ring-pink-500');
            } else if (['all', 'live', 'new'].includes(btn.dataset.filter) && filter !== btn.dataset.filter) {
                btn.classList.add('focus:ring-indigo-500');
                btn.classList.remove('focus:ring-red-500', 'focus:ring-purple-500', 'focus:ring-pink-500');
            }
        });

        filterAndSearchParticipants();
    }

    document.addEventListener('DOMContentLoaded', () => {
        filterParticipants('all');
    });
</script>