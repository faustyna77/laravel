<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wyniki Egzaminów') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5">
    @can('create')
        <div class="flex justify-end mb-4">
           
            <a href="{{ route('exam_results.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Dodaj wynik egzaminu</a>
        </div>
    @endcan
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Student</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nazwa Egzaminu</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Data Egzaminu</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Przedmiot</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Wynik</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exam_results as $exam_result)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ optional($exam_result->student)->first_name ?? 'Brak danych' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $exam_result->exam_name }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $exam_result->exam_date }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $exam_result->subject }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $exam_result->score }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @can('update',$exam_result)
                                <a href="{{ route('exam_results.edit', $exam_result) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edytuj</a>
                                @endcan
                                @can('delete',$exam_result)
                                <form action="{{ route('exam_results.destroy', $exam_result) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Usuń</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($exam_results->isEmpty())
                <div class="px-5 py-5 border-t border-black-200 bg-white text-sm text-center">Brak danych</div>
            @endif
        </div>
    </div>
</x-app-layout>
