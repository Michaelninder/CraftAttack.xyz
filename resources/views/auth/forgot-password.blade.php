<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Passwort vergessen? Kein Problem. Wir verwenden Twitch zum Einloggen, daher musst du dein Passwort auf Twitch zurücksetzen.') }}
    </div>

    <div class="flex items-center justify-center mt-4">
        <a href="https://www.twitch.tv/user/reset-password" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Passwort auf Twitch zurücksetzen') }}
        </a>
    </div>
</x-guest-layout>