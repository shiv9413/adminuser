<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'date',
        'transaction_type',
        'available_balance',
        'description',
        'user_id', // Assuming user_id is also a fillable field
        // Add other fields if needed
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
