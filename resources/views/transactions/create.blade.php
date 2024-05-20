<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj nową transakcję') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 mb-5">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="registration_id" class="block text-gray-700 dark:text-gray-300">Identyfikator rejestracji</label>
                <input type="number" id="registration_id" name="registration_id" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="transaction_date" class="block text-gray-700 dark:text-gray-300">Data transakcji</label>
                <input type="date" id="transaction_date" name="transaction_date" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-gray-700 dark:text-gray-300">Kwota</label>
                <input type="number" step="0.01" id="amount" name="amount" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="payment_method" class="block text-gray-700 dark:text-gray-300">Metoda płatności</label>
                <select id="payment_method" name="payment_method" class="form-control" required>
                    @foreach(App\Enums\PaymentMethod::cases() as $method)
                        <option value="{{ $method->value }}">{{ ucfirst(str_replace('_', ' ', $method->name)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 dark:text-gray-300">Status</label>
                <input type="text" id="status" name="status" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </form>
    </div>
</x-app-layout>
