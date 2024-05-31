<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rejestracje') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 mb-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-1">
                <h1 class="text-2xl font-bold">Rejestracje</h1>
            </div>
            @can('is-admin')
            <div class="mb-2">
                <a href="{{ route('registrations.create') }}" class="btn btn-primary">Wprowadż nową rejestrację </a>
            </div>
            @endcan
        </div>

        <div class="mt-5">
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            
                            <th class="px-4 py-2">Identyfikator studenta</th>
                            <th class="px-4 py-2">Identyfikator kierunku/kursu</th>
                            <th class="px-4 py-2">Data rejestracji</th>
                            <th class="px-4 py-2">Status rejestracji</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($registrations as $registration)
                        <tr>
                            <td class="border px-4 py-2">{{ $registration->student_id }}</td>
                            <td class="border px-4 py-2">{{ $registration->course_id }}</td>
                            <td class="border px-4 py-2">{{ $registration->registration_date}}</td>
                            <td class="border px-4 py-2">{{ $registration->status }}</td>
                     
                            @can('is-admin')
                            <td class="border px-4 py-2">
                                <a href="{{ route('registrations.edit', $registration->registration_id) }}" class="btn btn-warning">Edytuj</a>
                            </td>
                            @endcan
                            @can('delete',$registration)
                            <td class="border px-4 py-2">
                                <form method="POST" action="{{ route('registrations.destroy', $registration->registration_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="8">Brak studentów.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
