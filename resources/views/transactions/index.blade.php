<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transakcje') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 mb-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-1">
                <h1 class="text-2xl font-bold">Transakcje</h1>
            </div>
            @can('is-admin')
            <div class="mb-2">
                <a href="{{ route('transactions.create') }}" class="btn btn-primary">Dodaj nową transakcję</a>
            </div>
            @endcan
        </div>

        <div class="mt-5">
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Data transakcji</th>
                            <th class="px-4 py-2">Kwota</th>
                            <th class="px-4 py-2">Metoda płatności</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2"></th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                        <tr>
                            <td class="border px-4 py-2">{{ $transaction->transaction_id }}</td>
                            <td class="border px-4 py-2">{{ $transaction->transaction_date }}</td>
                            <td class="border px-4 py-2">{{ $transaction->amount }}</td>
                            <td class="border px-4 py-2">{{ $transaction->payment_method->value }}</td>
                            <td class="border px-4 py-2">{{ $transaction->status }}</td>
                            @can('is-admin')
                            <td class="border px-4 py-2">
                                <a href="{{ route('transactions.edit', $transaction->transaction_id) }}" class="btn btn-warning">Edytuj</a>
                            </td>
                            @endcan
                            <td class="border px-4 py-2">
                                @can('is-admin')
                                <form method="POST" action="{{ route('transactions.destroy', $transaction->transaction_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="8">Brak transakcji.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
