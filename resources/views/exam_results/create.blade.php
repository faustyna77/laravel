<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj Wynik Egzaminu') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5">
        <div class="flex justify-center">
            <div class="bg-white shadow-md rounded-lg overflow-hidden w-full max-w-md">
                <div class="px-6 py-4">
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Błąd!</strong>
                            <span class="block sm:inline">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </span>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('exam_results.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="student_id" class="block text-gray-700 text-sm font-bold mb-2">Student</label>
                            <select id="student_id" name="student_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                @foreach($students as $student)
                                    <option value="{{ $student->student_id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="exam_name" class="block text-gray-700 text-sm font-bold mb-2">Nazwa Egzaminu</label>
                            <input type="text" id="exam_name" name="exam_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="exam_date" class="block text-gray-700 text-sm font-bold mb-2">Data Egzaminu</label>
                            <input type="date" id="exam_date" name="exam_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 text-sm font-bold mb-2">Przedmiot</label>
                            <input type="text" id="subject" name="subject" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="score" class="block text-gray-700 text-sm font-bold mb-2">Wynik</label>
                            <input type="number" id="score" name="score" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required min="0" max="100">
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Dodaj Wynik</button>
                            <a href="{{ route('exam_results.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Powrót</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
