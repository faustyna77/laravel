<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PaymentMethod;
class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey='transaction_id';
    protected $fillable = [
        'registration_id',
        'transaction_date',
        'amount',
        'payment_method',
        'status',
    ];

    // Definiowanie relacji z innymi modelami
    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    protected $casts = [
        'payment_method' => PaymentMethod::class,
    ];
}
