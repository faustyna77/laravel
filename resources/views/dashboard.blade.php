<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <a href="{{ route('students.index') }}" class="card">
                    <div class="flex items-center justify-center">
                        <i class="bi bi-person-plus text-5xl text-purple-500"></i>
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="text-xl font-semibold">Rejestracja kandydata</h5>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Dodaj swoje dane jako student.</p>
                    </div>
                </a>
                <a href="{{ route('registrations.index') }}" class="card">
                    <div class="flex items-center justify-center">
                        <i class="bi bi-file-earmark-text text-5xl text-yellow-500"></i>
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="text-xl font-semibold">Panel rejestracji</h5>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Zarządzaj rejestracjami i aplikacjami.</p>
                    </div>
                </a>
                <a href="{{ route('transactions.index') }}" class="card">
                    <div class="flex items-center justify-center">
                        <i class="bi bi-cash-stack text-5xl text-green-500"></i>
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="text-xl font-semibold">Panel transakcji</h5>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Zarządzaj transakcjami i płatnościami.</p>
                    </div>
                </a>
                <a href="{{ route('courses.index') }}" class="card">
                    <div class="flex items-center justify-center">
                        <i class="bi bi-book text-5xl text-blue-500"></i>
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="text-xl font-semibold">Wybierz Kierunek Studiów</h5>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Znajdź interesujący Cię kierunek i aplikuj.</p>
                    </div>
                </a>
                <a href="{{ route('exam_results.index') }}" class="card">
                    <div class="flex items-center justify-center">
                        <i class="bi bi-pencil-square text-5xl text-red-500"></i>
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="text-xl font-semibold">Uzupełnij Dane Wyników Egzaminu</h5>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Wprowadź swoje wyniki egzaminów aby zwiększyć swoje szanse.</p>
                    </div>
                </a>
                <a href="{{ route('profile.edit') }}" class="card">
                    <div class="flex items-center justify-center">
                        <i class="bi bi-pencil-square text-5xl text-red-500"></i>
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="text-xl font-semibold">Aktualizuj swój profil</h5>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Zmień hasło  i login</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
