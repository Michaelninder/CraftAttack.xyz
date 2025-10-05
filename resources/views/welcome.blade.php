<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CraftAttack.xyz - Bald online!</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-ca-text-light dark:text-ca-text-dark bg-ca-light dark:bg-ca-dark min-h-screen flex flex-col justify-between">
    <header class="p-6 flex justify-end">
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-ca-text-light dark:text-ca-text-dark ring-1 ring-transparent transition hover:text-ca-primary-700 dark:hover:text-ca-primary-300 focus:outline-none focus:ring-2 focus:ring-ca-primary-500 focus:ring-offset-2 focus:ring-offset-ca-light dark:focus:ring-offset-ca-dark"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-ca-text-light dark:text-ca-text-dark ring-1 ring-transparent transition hover:text-ca-primary-700 dark:hover:text-ca-primary-300 focus:outline-none focus:ring-2 focus:ring-ca-primary-500 focus:ring-offset-2 focus:ring-offset-ca-light dark:focus:ring-offset-ca-dark"
                    >
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-ca-text-light dark:text-ca-text-dark ring-1 ring-transparent transition hover:text-ca-primary-700 dark:hover:text-ca-primary-300 focus:outline-none focus:ring-2 focus:ring-ca-primary-500 focus:ring-offset-2 focus:ring-offset-ca-light dark:focus:ring-offset-ca-dark"
                        >
                            Registrieren
                        </a>
                    @endif
                @endauth
                <x-theme-toggle />
            </nav>
        @endif
    </header>

    <main class="flex-grow flex items-center justify-center p-6">
        <div class="max-w-xl mx-auto text-center bg-ca-card-light dark:bg-ca-card-dark rounded-xl shadow-xl p-8 border border-ca-border-light dark:border-ca-border-dark">
            <h1 class="text-5xl font-bold text-ca-primary-600 dark:text-ca-primary-400 mb-4">CraftAttack.xyz</h1>
            <h2 class="text-3xl font-semibold text-ca-secondary-700 dark:text-ca-secondary-300 mb-6">Bald online!</h2>
            <p class="text-xl leading-relaxed mb-8">
                Deine zentrale Anlaufstelle für News und Twitch-Clips deiner liebsten CraftAttack-Teilnehmer.
                Melde dich an, um immer auf dem Laufenden zu bleiben!
            </p>
            @if (Route::has('login'))
                <div class="mt-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-ca-primary-600 hover:bg-ca-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ca-primary-500 transition-colors duration-200"
                        >
                            Zum Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-ca-primary-600 hover:bg-ca-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ca-primary-500 transition-colors duration-200"
                        >
                            Login via Twitch
                        </a>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="ms-4 inline-flex items-center px-6 py-3 border border-ca-primary-600 text-base font-medium rounded-md shadow-sm text-ca-primary-600 dark:text-ca-primary-400 bg-white dark:bg-ca-card-dark hover:bg-ca-primary-50 dark:hover:bg-ca-primary-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ca-primary-500 transition-colors duration-200"
                            >
                                Registrieren
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </main>

    <footer class="p-6 text-center text-sm text-ca-text-light dark:text-ca-text-dark/70">
        <p>&copy; {{ date('Y') }} CraftAttack.xyz. Alle Rechte vorbehalten. Dies ist ein inoffizielles Fan-Projekt.</p>
        <p class="mt-1">
            <a href="https://fternis.de" class="hover:text-ca-primary-700 dark:hover:text-ca-primary-300 transition-colors duration-200">Fabian Ternis</a> &amp;
            <a href="https://michaelninder.de" class="hover:text-ca-primary-700 dark:hover:text-ca-primary-300 transition-colors duration-200">Michael Ninder</a>
        </p>
    </footer>
</body>
</html>