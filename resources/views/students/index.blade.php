<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Studenci') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 mb-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-1">
                <h1 class="text-2xl font-bold">Studenci</h1>
            </div>
            @can('is-admin')
            <div class="mb-2">
                <a href="{{ route('students.create') }}" class="btn btn-primary">Dodaj nowego studenta</a>
            </div>
            @endcan
        </div>

        <div class="mt-5">
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Imię</th>
                            <th class="px-4 py-2">Nazwisko</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Data urodzenia</th>
                            <th class="px-4 py-2">Szczegóły</th>
                            <th class="px-4 py-2"></th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <td class="border px-4 py-2">{{ $student->student_id }}</td>
                            <td class="border px-4 py-2">{{ $student->first_name }}</td>
                            <td class="border px-4 py-2">{{ $student->last_name }}</td>
                            <td class="border px-4 py-2">{{ $student->email }}</td>
                            <td class="border px-4 py-2">{{ $student->date_of_birth }}</td>
                            <td class="border px-4 py-2">{{ $student->other_details }}</td>
                            @can('is-admin')
                            <td class="border px-4 py-2">
                                <a href="{{ route('students.edit', $student->student_id) }}" class="btn btn-warning">Edytuj</a>
                            </td>
                            @endcan
                            <td class="border px-4 py-2">
                                @can('is-admin')
                                <form method="POST" action="{{ route('students.destroy', $student->student_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                                @endcan
                            </td>
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
