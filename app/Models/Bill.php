<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids; // Required for UUIDs

class Bill extends Model
{
    use HasFactory, HasUuids;

    // 1. Explicitly tell Laravel we are using UUIDs
    protected $primaryKey = 'bill_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    // 2. Mass Assignable Fields
    protected $fillable = [
        'user_id',
        'type',           // Water, Electricity, Rent, Association Dues
        'status',         // Paid, Unpaid, Overdue
        'amount',
        'due_date',
        'consumption',    // Nullable
        'reading_start',  // Nullable
        'reading_end',    // Nullable
        'date_paid',      // Filled when paid
        'payment_method', // Cash, Online Payment
    ];

    // 3. Data Casting (Automatically formats dates and numbers)
    protected $casts = [
        'due_date' => 'date',
        'reading_start' => 'date',
        'reading_end' => 'date',
        'date_paid' => 'date',
        'amount' => 'decimal:2',
    ];

    // Relationship: A Bill belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
