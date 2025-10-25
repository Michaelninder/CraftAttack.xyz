@php
    $goals = [
        ['threshold' => 10, 'description' => 'Erste Meilenstein erreicht!'],
        ['threshold' => 50, 'description' => 'Wachsende Gemeinschaft!'],
        ['threshold' => 100, 'description' => 'Starke Basis!'],
        ['threshold' => 250, 'description' => 'Blühende Community!'],
        ['threshold' => 500, 'description' => 'Gigantische Familie!'],
    ];

    $currentGoal = null;
    foreach ($goals as $index => $goal) {
        if ($userCount < $goal['threshold']) {
            $currentGoal = $goal;
            $currentGoal['index'] = $index;
            break;
        }
    }

    $progress = 0;
    $goalAchieved = false;
    $goalStatusMessage = 'Wir haben alle Ziele erreicht! 🎉';
    $goalHeadline = 'Alle Community-Ziele erreicht!';

    if ($currentGoal) {
        $previousThreshold = 0;
        if ($currentGoal['index'] > 0) {
            $previousThreshold = $goals[$currentGoal['index'] - 1]['threshold'];
        }
        $range = $currentGoal['threshold'] - $previousThreshold;
        $currentProgressInRealNumbers = $userCount - $previousThreshold;

        if ($range > 0) {
            $progress = min(100, max(0, ($currentProgressInRealNumbers / $range) * 100));
        } else {
            $progress = 100;
        }
        $goalHeadline = "Nächstes Ziel: {$currentGoal['threshold']} Nutzer";
        $goalStatusMessage = $currentGoal['description'];
    } else {
        $goalAchieved = true;
        $progress = 100;
    }
@endphp

<div class="bg-gray-50 dark:bg-gray-900 py-16 sm:py-24">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold text-indigo-600 dark:text-indigo-400">
                Community Ziele
            </h2>
            <p class="mt-2 text-3xl font-bold leading-8 tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                Was wir gemeinsam erreichen wollen
            </p>
            <p class="mx-auto mt-4 text-xl text-gray-500 dark:text-gray-300">
                Hilf uns, unsere Community-Ziele zu erreichen!
            </p>
        </div>

        <div
            class="mt-10 bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 border border-gray-200 dark:border-gray-700"
        >
            <h3
                class="text-xl font-bold text-gray-900 dark:text-white mb-4 text-center"
            >
                {{ $goalHeadline }}
            </h3>
            <p
                class="text-lg text-gray-700 dark:text-gray-300 mb-6 text-center"
            >
                {{ $goalStatusMessage }}
            </p>

            <div class="relative pt-1">
                <div class="flex mb-2 items-center justify-between">
                    <div>
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full bg-indigo-200 text-indigo-600 dark:bg-indigo-700 dark:text-indigo-200"
                        >
                            Aktuelle Nutzer
                        </span>
                    </div>
                    <div class="text-right">
                        <span
                            class="text-xs font-semibold inline-block text-indigo-600 dark:text-indigo-400"
                        >
                            {{ $userCount }} / @if($currentGoal)
                            {{ $currentGoal['threshold'] }} @else
                            {{ $userCount }} @endif
                        </span>
                    </div>
                </div>
                <div
                    class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-indigo-200 dark:bg-indigo-700"
                >
                    <div
                        style="width:{{ $progress }}%"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500 dark:bg-indigo-400 transition-all duration-1000 ease-out animate-progressbar"
                    ></div>
                </div>
            </div>

            @if (!$goalAchieved && $currentGoal)
            <p class="mt-6 text-center text-gray-600 dark:text-gray-400">
                Noch
                <span
                    class="font-bold text-indigo-600 dark:text-indigo-400"
                    >{{ $currentGoal['threshold'] - $userCount }}</span
                >
                Nutzer, bis dieses Ziel erreicht ist!
            </p>
            @endif
        </div>
    </div>
</div>

<style>
    @keyframes progressbar {
        0% {
            width: 0%;
        }
        100% {
            width: var(--progress-width);
        }
    }

    .animate-progressbar {
        animation: progressbar 1s ease-out forwards;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const progressBar = document.querySelector(".animate-progressbar");
        if (progressBar) {
            const progressWidth = progressBar.style.width;
            progressBar.style.setProperty("--progress-width", progressWidth);
            progressBar.style.width = "0%";
            setTimeout(() => {
                progressBar.style.width = progressWidth;
            }, 100);
        }
    });
</script>