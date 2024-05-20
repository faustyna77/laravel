<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Enums\PaymentMethod;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $paymentMethods = PaymentMethod::cases();
        return view('transactions.create', compact('paymentMethods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_id' => 'required|exists:registrations,registration_id',
            'transaction_date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_method' => 'required|in:' . implode(',', array_column(PaymentMethod::cases(), 'value')),
            'status' => 'required|string|max:255',
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        $paymentMethods = PaymentMethod::cases();
        return view('transactions.edit', compact('transaction', 'paymentMethods'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'registration_id' => 'required|exists:registrations,registration_id',
            'transaction_date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_method' => 'required|in:' . implode(',', array_column(PaymentMethod::cases(), 'value')),
            'status' => 'required|string|max:255',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index');
    }
}
