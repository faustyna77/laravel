<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kursy') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 mb-5">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Kursy</h1>
            @can('create')
            <a href="{{ route('courses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Dodaj nowy kurs</a>
            @endcan
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nazwa kierunku</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Opis kierunku</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Opiekun kierunku</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Data rozpoczęcia</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Data zakończenia</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Maksymalna liczba osób przyjętych</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $course->course_id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $course->course_name }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $course->course_description }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $course->instructor->full_name }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $course->start_date }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $course->end_date }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $course->max_capacity }}</td>
                            @can('update', $course)
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('courses.edit', $course->course_id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edytuj</a>
                            </td>
                            @endcan
                            @can('delete', $course)
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                           
                                <form method="POST" action="{{ route('courses.destroy', $course->course_id) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Usuń</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center" colspan="9">Brak kursów.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if($courses->isEmpty())
                <div class="px-5 py-5 border-t border-gray-200 bg-white text-sm text-center">Brak danych</div>
            @endif
        </div>
    </div>
</x-app-layout>
