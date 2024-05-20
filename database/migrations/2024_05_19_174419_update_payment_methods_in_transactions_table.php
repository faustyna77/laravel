<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PaymentMethod;

return new class extends Migration {
    public function up() {
        DB::table('transactions')->where('payment_method', 'Credit Card')->update(['payment_method' => PaymentMethod::CreditCard->value]);
        DB::table('transactions')->where('payment_method', 'PayPal')->update(['payment_method' => PaymentMethod::PayPal->value]);
        DB::table('transactions')->where('payment_method', 'Bank Transfer')->update(['payment_method' => PaymentMethod::BankTransfer->value]);
    }

    public function down() {
        DB::table('transactions')->where('payment_method', PaymentMethod::CreditCard->value)->update(['payment_method' => 'Credit Card']);
        DB::table('transactions')->where('payment_method', PaymentMethod::PayPal->value)->update(['payment_method' => 'PayPal']);
        DB::table('transactions')->where('payment_method', PaymentMethod::BankTransfer->value)->update(['payment_method' => 'Bank Transfer']);
    }
};
